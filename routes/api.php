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


Route::post('/tamu', [ApiController::class, 'simpanTamu']);
Route::get('/admin/tamu', [ApiController::class, 'daftarTamuAdmin']);


// admin
Route::get('/wilayah', [ApiController::class, 'daftarWilayah']);
Route::post('/wilayah', [ApiController::class, 'simpanWilayah']);     
Route::delete('/wilayah/{id}', [ApiController::class, 'hapusWilayah']);

Route::post('/paket', [ApiController::class, 'simpanPaket']);         
Route::get('/paket/wilayah/{wilayahId?}', [ApiController::class, 'paketBerdasarkanWilayah']);
Route::delete('/paket/{id}', [ApiController::class, 'hapusPaket']);
