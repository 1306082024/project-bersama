<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tamu;

class TeknisiController extends Controller
{
    public function tugas()
    {
        return response()->json(
            Tamu::with('paket')
                ->whereIn('status', ['Menunggu Instalasi', 'Terpasang'])
                ->orderBy('created_at')
                ->get()
        );
    }

    public function selesai($id)
    {
        $t = Tamu::findOrFail($id);
        $t->status = 'Terpasang';
        $t->save();

        return response()->json(['ok' => true]);
    }
}