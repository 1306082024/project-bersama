<?php
namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Paket;
use App\Models\Wilayah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    // daftar wilayah
    public function daftarWilayah()
    {
        return response()->json(Wilayah::orderBy('nama')->get());
    }
    
    // simpan wilayah
    public function simpanWilayah(Request $r){
        $v = Validator::make($r->all(), [
            'nama' => 'required|string|max:255|unique:wilayah,nama',
            'slug' => 'nullable|string|max:255|unique:wilayah,slug',
            'keterangan' => 'nullable|string'
        ]);
        if($v->fails()) return response()->json(['errors'=>$v->errors()],422);

        $slug = $r->slug ?: Str::slug($r->nama);
        $wilayah = Wilayah::create([
            'nama'=>$r->nama,
            'slug'=>$slug,
            'keterangan'=>$r->keterangan
        ]);
        return response()->json(['ok'=>true,'wilayah'=>$wilayah],201);
    }

    public function hapusWilayah($id){
        $w = Wilayah::find($id);
        if(!$w) return response()->json(['error'=>'Wilayah tidak ditemukan'],404);
        $w->delete();
        return response()->json(['ok'=>true]);
    }

    // paket berdasarkan wilayah (id wilayah optional)
    public function paketBerdasarkanWilayah($wilayahId = null)
    {
        $wilayahId = intval($wilayahId);
        $paket = Paket::all()->filter(function($p) use ($wilayahId) {
            if (!$p->wilayah_id) return true; 
            return in_array($wilayahId, $p->wilayah_id);
        })->values();

        return response()->json($paket);
    }

    // simpan paket
    public function simpanPaket(Request $r){
    $v = Validator::make($r->all(), [
        'nama' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255|unique:paket,slug',
        'harga' => 'required|numeric|min:0',
        'deskripsi' => 'nullable|string',
        'wilayah_id' => 'nullable|array',
        'wilayah_id.*' => 'integer|exists:wilayah,id'
    ]);
    if($v->fails()){
        return response()->json(['ok'=>false,'errors'=>$v->errors()],422);
    }
    
    $slug = $r->slug ?: Str::slug($r->nama);
    try {
        $paket = Paket::create([
            'nama' => $r->nama,
            'slug' => $slug,
            'harga' => $r->harga,
            'deskripsi' => $r->deskripsi,
            'wilayah_id' => $r->wilayah_id ?: null,
        ]);
        return response()->json(['ok'=>true,'paket'=>$paket],201);
    } catch(\Throwable $e){
        Log::error('Error simpanPaket: '.$e->getMessage());
        return response()->json(['ok'=>false,'message'=>'Internal server error','detail'=>$e->getMessage()],500);
    }
    }

    public function hapusPaket($id){
        $p = Paket::find($id);
        if(!$p) return response()->json(['error'=>'Paket tidak ditemukan'],404);
        $p->delete();
        return response()->json(['ok'=>true]);
    }

    // menyimpan tamu (submit form)
    public function simpanTamu(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'pesan' => 'required',
        ]);

        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $tamu = Tamu::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'wilayah_id' => $request->wilayah_id ?: null,
            'paket_id' => $request->paket_id ?: null,
            'pesan' => $request->pesan,
            'lokasi' => $request->lokasi ?: null,
        ]);

        return response()->json(['ok' => true, 'tamu' => $tamu], 201);
    }

    // daftar tamu untuk admin
    public function daftarTamuAdmin()
    {
        return response()->json(Tamu::with(['wilayah','paket'])->orderByDesc('created_at')->get());
    }
}
