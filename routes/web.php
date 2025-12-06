<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
   return view('landing page IPTV');
});

Route::get('/Pendaftaran', function () {
   return view('Pendaftaran');
});

Route::get('/aP', function () {
   return view('adminP');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua rute API (stateless, via prefix /api) didefinisikan di sini.
|--------------------------------------------------------------------------
*/

Route::get('/wilayah', [ApiController::class, 'daftarWilayah']);
Route::get('/paket/wilayah/{wilayahId?}', [ApiController::class, 'paketBerdasarkanWilayah']);
Route::post('/tamu', [ApiController::class, 'simpanTamu']);
Route::get('/admin/tamu', [ApiController::class, 'daftarTamuAdmin']);

// TEST ROUTE (untuk memastikan API terbaca)
Route::get('/test-api', function () {
    return 'API TERBACA';
});

require __DIR__.'/auth.php';
