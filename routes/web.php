<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DisplayController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
   return view('landing page IPTV');
});

Route::get('/beranda', function () {
   return view('beranda');
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

Route::get('/beranda', [DisplayController::class, 'beranda'])->name('beranda');
Route::get('/restoran', [DisplayController::class, 'restoran'])->name('restoran.restoran');
Route::get('/layanan', [DisplayController::class, 'layanan'])->name('layanan.layanan');
Route::get('/fasilitas', [DisplayController::class, 'fasilitas'])->name('fasilitas.fasilitas');
Route::get('/tvnfilm', [DisplayController::class, 'tvnfilm'])->name('tvnfilm.tvnfilm');
Route::get('/yt', [DisplayController::class, 'yt'])->name('yt.yt');



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
