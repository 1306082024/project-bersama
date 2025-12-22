<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TamuController extends Controller
{
    // POST /api/tamu
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nama'         => 'required|max:255',
            'kontak'       => 'required|max:255',
            'pesan'        => 'required',
            'alamat_jalan' => 'required',
        ]);

        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $tamu = Tamu::create([
            'nama'         => $request->nama,
            'nik'          => $request->nik,
            'ttl'          => $request->ttl,
            'kontak'       => $request->kontak,
            'email'        => $request->email,
            'wilayah_id'   => $request->wilayah_id ?: null,
            'paket_id'     => $request->paket_id ?: null,
            'alamat_jalan' => $request->alamat_jalan,
            'rt'           => $request->rt,
            'rw'           => $request->rw,
            'no_rumah'     => $request->no_rumah,
            'desa'         => $request->desa,
            'kecamatan'    => $request->kecamatan,
            'kabupaten'    => $request->kabupaten,
            'full_alamat'  => $request->full_alamat,
            'pesan'        => $request->pesan,
            'lokasi'       => $request->lokasi,
        ]);

        return response()->json(['ok' => true, 'tamu' => $tamu], 201);
    }

    // GET /api/admin/tamu
    public function indexAdmin()
    {
        return response()->json(
            Tamu::with(['wilayah', 'paket'])
                ->orderByDesc('created_at')
                ->get()
        );
    }

    // PATCH /api/admin/tamu/{id}/status
    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);

        $tamu = Tamu::findOrFail($id);
        $tamu->status = $request->status;
        $tamu->save();

        return response()->json(['success' => true, 'status' => $tamu->status]);
    }

    // DELETE /api/admin/tamu/{id}
    public function destroy($id)
    {
        $tamu = Tamu::find($id);
        if (!$tamu) {
            return response()->json(['ok' => false, 'error' => 'Tamu tidak ditemukan'], 404);
        }
        $tamu->delete();
        return response()->json(['ok' => true]);
    }
}