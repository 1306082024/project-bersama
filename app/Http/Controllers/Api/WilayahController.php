<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class WilayahController extends Controller
{
    public function index()
    {
        return response()->json(Wilayah::orderBy('nama')->get());
    }

    public function store(Request $r)
    {
        $v = Validator::make($r->all(), [
            'nama'       => 'required|string|max:255|unique:wilayah,nama',
            'slug'       => 'nullable|string|max:255|unique:wilayah,slug',
            'keterangan' => 'nullable|string'
        ]);

        if ($v->fails()) return response()->json(['errors' => $v->errors()], 422);

        $wilayah = Wilayah::create([
            'nama'       => $r->nama,
            'slug'       => $r->slug ?: Str::slug($r->nama),
            'keterangan' => $r->keterangan
        ]);

        return response()->json(['ok' => true, 'wilayah' => $wilayah], 201);
    }

    public function update(Request $r, $id)
    {
        $w = Wilayah::findOrFail($id);
        $r->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:wilayah,slug,'.$id,
            'keterangan' => 'nullable|string'
        ]);

        $w->update([
            'nama' => $r->nama,
            'slug' => $r->slug ?: Str::slug($r->nama),
            'keterangan' => $r->keterangan
        ]);

        return response()->json(['ok' => true]);
    }

    public function destroy($id)
    {
        $w = Wilayah::find($id);
        if (!$w) return response()->json(['error' => 'Wilayah tidak ditemukan'], 404);
        $w->delete();
        return response()->json(['ok' => true]);
    }
}