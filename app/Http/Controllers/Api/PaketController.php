<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function index()
    {
        return response()->json(Paket::orderBy('nama')->get());
    }

    public function byWilayah($wilayahId = null)
    {
        $wilayahId = intval($wilayahId);
        if ($wilayahId <= 0) {
            return response()->json(Paket::orderBy('nama')->get());
        }

        $paket = Paket::all()->filter(function ($p) use ($wilayahId) {
            if (!$p->wilayah_id || !is_array($p->wilayah_id) || count($p->wilayah_id) === 0) {
                return true;
            }
            return in_array($wilayahId, $p->wilayah_id);
        })->values();

        return response()->json($paket);
    }

    public function store(Request $r)
    {
        $v = Validator::make($r->all(), [
            'nama'         => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:paket,slug',
            'harga'        => 'required|numeric|min:0',
            'deskripsi'    => 'nullable|string',
            'wilayah_id'   => 'nullable|array',
            'wilayah_id.*' => 'integer|exists:wilayah,id',
        ]);

        if ($v->fails()) return response()->json(['ok' => false, 'errors' => $v->errors()], 422);

        try {
            $paket = Paket::create([
                'nama'       => $r->nama,
                'slug'       => $r->slug ?: Str::slug($r->nama),
                'harga'      => $r->harga,
                'deskripsi'  => $r->deskripsi,
                'wilayah_id' => $r->wilayah_id ?: null,
            ]);
            return response()->json(['ok' => true, 'paket' => $paket], 201);
        } catch (\Throwable $e) {
            Log::error('Error simpanPaket: '.$e->getMessage());
            return response()->json(['ok' => false, 'message' => 'Internal server error'], 500);
        }
    }

    public function update(Request $r, $id)
    {
        $paket = Paket::findOrFail($id);
        $v = Validator::make($r->all(), [
            'nama'         => 'required|string|max:255',
            'slug'         => 'nullable|string|max:255|unique:paket,slug,'.$paket->id,
            'harga'        => 'required|numeric|min:0',
            'deskripsi'    => 'nullable|string',
            'wilayah_id'   => 'nullable|array',
            'wilayah_id.*' => 'integer|exists:wilayah,id',
        ]);

        if ($v->fails()) return response()->json(['ok' => false, 'errors' => $v->errors()], 422);

        $paket->update([
            'nama'       => $r->nama,
            'slug'       => $r->slug ?: Str::slug($r->nama),
            'harga'      => $r->harga,
            'deskripsi'  => $r->deskripsi,
            'wilayah_id' => $r->wilayah_id ?: null,
        ]);

        return response()->json(['ok' => true, 'paket' => $paket]);
    }

    public function destroy($id)
    {
        $p = Paket::find($id);
        if (!$p) return response()->json(['error' => 'Paket tidak ditemukan'], 404);
        $p->delete();
        return response()->json(['ok' => true]);
    }
}