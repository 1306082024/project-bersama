<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tamu;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(
            Tamu::with(['paket', 'wilayah'])
                ->where('status', 'Terpasang')
                ->orderByDesc('created_at')
                ->get()
                ->map(function ($t) {
                    return [
                        'id'          => $t->id,
                        'nama'        => $t->nama,
                        'kontak'      => $t->kontak,
                        'email'       => $t->email,
                        'alamat'      => $t->full_alamat,
                        'paket'       => $t->paket?->nama,
                        'jatuh_tempo' => 10,
                        'status'      => 'Aktif',
                        'lokasi'      => $t->lokasi,
                    ];
                })
        );
    }
}