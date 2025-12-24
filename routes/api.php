<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TamuController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\TeknisiController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\Api\PelangganController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Prefix otomatis: /api
|--------------------------------------------------------------------------
*/

/* =========================
 | TAMU / PENDAFTARAN
 ========================= */
Route::post('/tamu', [TamuController::class, 'store']);
Route::get('/admin/tamu', [TamuController::class, 'indexAdmin']);
Route::patch('/admin/tamu/{id}/status', [TamuController::class, 'updateStatus']);
Route::delete('/admin/tamu/{id}', [TamuController::class, 'destroy']);

/* =========================
 | WILAYAH
 ========================= */
Route::get('/wilayah', [WilayahController::class, 'index']);
Route::post('/wilayah', [WilayahController::class, 'store']);
Route::put('/wilayah/{id}', [WilayahController::class, 'update']);
Route::delete('/wilayah/{id}', [WilayahController::class, 'destroy']);

/* =========================
 | PAKET
 ========================= */
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/wilayah/{wilayahId?}', [PaketController::class, 'byWilayah']);
Route::post('/paket', [PaketController::class, 'store']);
Route::put('/paket/{id}', [PaketController::class, 'update']);
Route::delete('/paket/{id}', [PaketController::class, 'destroy']);

/* =========================
 | PELANGGAN (ADMIN)
 ========================= */
Route::get('/admin/pelanggan', [PelangganController::class, 'index']);

/* =========================
 | TEKNISI
 ========================= */

Route::get('/teknisi/tugas', [TeknisiController::class, 'tugas']);
Route::post('/teknisi/selesai/{id}', [TeknisiController::class, 'selesai']);

Route::get('/admin/laporan-instalasi', function () {
    return DB::table('tugas_instalasi')
        ->join('tamu', 'tugas_instalasi.tamu_id', '=', 'tamu.id')
        ->leftJoin('paket', 'tamu.paket_id', '=', 'paket.id')
        ->leftJoin('teknisi', 'tugas_instalasi.teknisi_id', '=', 'teknisi.id')
        ->select(
            'tugas_instalasi.*', 
            'tamu.nama as nama_pelanggan',
            'tamu.full_alamat',
            'tamu.alamat_jalan',
            'paket.nama as nama_paket',
            'teknisi.nama as nama_teknisi'
        )
        ->orderBy('tugas_instalasi.created_at', 'desc')
        ->get();
});