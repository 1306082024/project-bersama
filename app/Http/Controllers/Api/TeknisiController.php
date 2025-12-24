<?php

namespace App\Http\Controllers\Api;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeknisiController extends Controller
{
    public function tugas()
    {
        // PENTING: Mengambil foto_bukti dari tabel tugas_instalasi
        return response()->json(
            DB::table('tamu')
                ->leftJoin('tugas_instalasi', 'tamu.id', '=', 'tugas_instalasi.tamu_id')
                ->leftJoin('paket', 'tamu.paket_id', '=', 'paket.id')
                ->select(
                    'tamu.id', 'tamu.nama', 'tamu.alamat_jalan', 'tamu.full_alamat', 'tamu.status', 'tamu.updated_at', 'tamu.lokasi',
                    'tugas_instalasi.foto_bukti', // Kolom vital untuk foto
                    'paket.nama as nama_paket'
                )
                ->whereIn('tamu.status', ['Menunggu Instalasi', 'Terpasang'])
                ->orderBy('tamu.updated_at', 'desc')
                ->get()
        );
    }

public function selesai(Request $request, $id)
{
    // Validasi tetap sama
    $request->validate([
        'foto_instalasi' => 'required|image|mimes:jpg,jpeg,png|max:5120',
    ]);

    $tamu = Tamu::findOrFail($id);
    $namaFile = null;

    if ($request->hasFile('foto_instalasi')) {
        $file = $request->file('foto_instalasi');
        
        // Bersihkan nama file
        $cleanName = str_replace(' ', '_', $file->getClientOriginalName());
        $namaFile = time() . '_' . $cleanName;
        
        // PERUBAHAN PENTING DI SINI:
        // Tambahkan parameter ke-3 'public' agar file dipaksa masuk ke storage/app/public
        // Jangan lupa pastikan folder 'instalasi' ada
        $file->storeAs('instalasi', $namaFile, 'public'); 
    }

    try {
        DB::transaction(function () use ($tamu, $namaFile) {
            // Hapus data lama biar tidak duplikat
            DB::table('tugas_instalasi')->where('tamu_id', $tamu->id)->delete();

            // Insert data baru
            DB::table('tugas_instalasi')->insert([
                'tamu_id' => $tamu->id,
                'teknisi_id' => auth()->id() ?? 1, 
                'status' => 'Terpasang',
                'foto_bukti' => $namaFile, // Nama file disimpan ke DB
                'tanggal_selesai' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update status tamu
            DB::table('tamu')->where('id', $tamu->id)->update([
                'status' => 'Terpasang',
                'updated_at' => now()
            ]);
        });

        return response()->json(['ok' => true, 'message' => 'Upload Berhasil']);

    } catch (\Exception $e) {
        return response()->json(['ok' => false, 'message' => $e->getMessage()], 500);
    }
}
}