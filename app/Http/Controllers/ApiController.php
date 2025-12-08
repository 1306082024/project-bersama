<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Paket;
use App\Models\Wilayah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    // ==============================
    // WILAYAH
    // ==============================

    // GET /api/wilayah
    public function daftarWilayah()
    {
        return response()->json(
            Wilayah::orderBy('nama')->get()
        );
    }

    // POST /api/wilayah
    public function simpanWilayah(Request $r)
    {
        $v = Validator::make($r->all(), [
            'nama'       => 'required|string|max:255|unique:wilayah,nama',
            'slug'       => 'nullable|string|max:255|unique:wilayah,slug',
            'keterangan' => 'nullable|string'
        ]);

        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()], 422);
        }

        $slug = $r->slug ?: Str::slug($r->nama);

        $wilayah = Wilayah::create([
            'nama'       => $r->nama,
            'slug'       => $slug,
            'keterangan' => $r->keterangan
        ]);

        return response()->json([
            'ok'      => true,
            'wilayah' => $wilayah
        ], 201);
    }

    // DELETE /api/wilayah/{id}
    public function hapusWilayah($id)
    {
        $w = Wilayah::find($id);
        if (!$w) {
            return response()->json(['error' => 'Wilayah tidak ditemukan'], 404);
        }

        $w->delete();
        return response()->json(['ok' => true]);
    }

    // ==============================
    // PAKET
    // ==============================

    // GET /api/paket (admin)
    public function daftarSemuaPaket()
    {
        return response()->json(
            Paket::orderBy('nama')->get()
        );
    }

    // GET /api/paket/wilayah/{wilayahId?} (frontend)
    public function paketBerdasarkanWilayah($wilayahId = null)
    {
        $wilayahId = intval($wilayahId);

        // jika 0 / null → kirim semua paket
        if ($wilayahId <= 0) {
            return response()->json(
                Paket::orderBy('nama')->get()
            );
        }

        // filter manual berdasarkan array JSON wilayah_id
        $paket = Paket::all()->filter(function ($p) use ($wilayahId) {
            // jika paket tidak dibatasi wilayah → tampil di semua wilayah
            if (!$p->wilayah_id || !is_array($p->wilayah_id) || count($p->wilayah_id) === 0) {
                return true;
            }
            return in_array($wilayahId, $p->wilayah_id);
        })->values();

        return response()->json($paket);
    }

    // POST /api/paket
    public function simpanPaket(Request $r)
    {
        $v = Validator::make($r->all(), [
            'nama'         => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:paket,slug',
            'harga'        => 'required|numeric|min:0',
            'deskripsi'    => 'nullable|string',
            'wilayah_id'   => 'nullable|array',
            'wilayah_id.*' => 'integer|exists:wilayah,id',
        ]);

        if ($v->fails()) {
            return response()->json([
                'ok'     => false,
                'errors' => $v->errors()
            ], 422);
        }

        $slug = $r->slug ?: Str::slug($r->nama);

        try {
            $paket = Paket::create([
                'nama'       => $r->nama,
                'slug'       => $slug,
                'harga'      => $r->harga,
                'deskripsi'  => $r->deskripsi,
                'wilayah_id' => $r->wilayah_id ?: null, // JSON (array) / null
            ]);

            return response()->json([
                'ok'    => true,
                'paket' => $paket
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error simpanPaket: '.$e->getMessage());

            return response()->json([
                'ok'      => false,
                'message' => 'Internal server error',
                'detail'  => $e->getMessage()
            ], 500);
        }
    }

    // PUT /api/paket/{id}
    public function updatePaket(Request $r, $id)
    {
        $paket = Paket::find($id);
        if (!$paket) {
            return response()->json(['ok' => false, 'message' => 'Paket tidak ditemukan'], 404);
        }

        $v = Validator::make($r->all(), [
            'nama'         => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:paket,slug,'.$paket->id,
            'harga'        => 'required|numeric|min:0',
            'deskripsi'    => 'nullable|string',
            'wilayah_id'   => 'nullable|array',
            'wilayah_id.*' => 'integer|exists:wilayah,id',
        ]);

        if ($v->fails()) {
            return response()->json(['ok' => false, 'errors' => $v->errors()], 422);
        }

        $slug = $r->slug ?: Str::slug($r->nama);

        $paket->update([
            'nama'       => $r->nama,
            'slug'       => $slug,
            'harga'      => $r->harga,
            'deskripsi'  => $r->deskripsi,
            'wilayah_id' => $r->wilayah_id ?: null,
        ]);

        return response()->json(['ok' => true, 'paket' => $paket]);
    }

    // DELETE /api/paket/{id}
    public function hapusPaket($id)
    {
        $p = Paket::find($id);
        if (!$p) {
            return response()->json(['error' => 'Paket tidak ditemukan'], 404);
        }

        $p->delete();
        return response()->json(['ok' => true]);
    }

    // ==============================
    // TAMU / PENDAFTARAN
    // ==============================

    // POST /api/tamu
    public function simpanTamu(Request $request)
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
            'nama'       => $request->nama,
            'nik'        => $request->nik,
            'ttl'        => $request->ttl,

            'kontak'     => $request->kontak,
            'email'      => $request->email,

            'wilayah_id' => $request->wilayah_id ?: null,
            'paket_id'   => $request->paket_id ?: null,

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

        return response()->json([
            'ok'   => true,
            'tamu' => $tamu
        ], 201);
    }

    // GET /api/admin/tamu
    public function daftarTamuAdmin()
    {
        return response()->json(
            Tamu::with(['wilayah','paket'])
                ->orderByDesc('created_at')
                ->get()
        );
    }

    // DELETE /api/admin/tamu/{id}
    public function hapusTamuAdmin($id)
    {
        $tamu = Tamu::find($id);

        if (!$tamu) {
            return response()->json([
                'ok'    => false,
                'error' => 'Tamu tidak ditemukan'
            ], 404);
        }

        $tamu->delete();

        return response()->json([
            'ok' => true
        ]);
    }
}
