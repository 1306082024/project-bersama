<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua rute API (stateless, via prefix /api) didefinisikan di sini.
|-------------------------------------------------------------------------- 
*/

// PENDAFTAR 
Route::patch('/admin/tamu/{id}/status', [ApiController::class, 'updateStatus']);
Route::post('/tamu', [ApiController::class, 'simpanTamu']);
Route::get('/admin/tamu', [ApiController::class, 'daftarTamuAdmin']);
Route::delete('/admin/tamu/{id}', [ApiController::class, 'hapusTamuAdmin']);

// WILAYAH
Route::get('/wilayah', [ApiController::class, 'daftarWilayah']);
Route::post('/wilayah', [ApiController::class, 'simpanWilayah']);
Route::put('/wilayah/{id}', [ApiController::class, 'updateWilayah']);
Route::delete('/wilayah/{id}', [ApiController::class, 'hapusWilayah']);

// PAKET
Route::get('/paket', [ApiController::class, 'daftarSemuaPaket']); 
Route::get('/paket/wilayah/{wilayahId?}', [ApiController::class, 'paketBerdasarkanWilayah']);
Route::post('/paket', [ApiController::class, 'simpanPaket']);
Route::put('/paket/{id}', [ApiController::class, 'updatePaket']);
Route::delete('/paket/{id}', [ApiController::class, 'hapusPaket']);

// PELANGGAN
Route::get('/admin/pelanggan', [ApiController::class, 'daftarPelanggan']);

Route::get('/teknisi/tugas', [ApiController::class,'tugasTeknisi']);
Route::patch('/teknisi/selesai/{id}', [ApiController::class,'selesaiInstalasi']);
