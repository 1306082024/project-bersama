<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\TamuController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\TeknisiController;

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
Route::patch('/teknisi/selesai/{id}', [TeknisiController::class, 'selesai']);
