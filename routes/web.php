<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| ROOT (AUTO REDIRECT SESUAI ROLE)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return match (auth()->user()->role) {
            'super admin' => redirect()->route('super.admin.dashboard'),
            'display' => redirect()->route('display.dashboard'),
            default => abort(403),
        };
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| PUBLIC / DISPLAY CONTENT
|--------------------------------------------------------------------------
*/

Route::get('/beranda', [DisplayController::class, 'beranda'])->name('beranda');
Route::get('/iptv', [DisplayController::class, 'iptv'])->name('iptv');
Route::get('/restoran', [DisplayController::class, 'restoran'])->name('restoran.restoran');
Route::get('/layanan', [DisplayController::class, 'layanan'])->name('layanan.layanan');
Route::get('/fasilitas', [DisplayController::class, 'fasilitas'])->name('fasilitas.fasilitas');
Route::get('/tvnfilm', [DisplayController::class, 'tvnfilm'])->name('tvnfilm.tvnfilm');
Route::get('/yt', [DisplayController::class, 'yt'])->name('yt.yt');

/*
|--------------------------------------------------------------------------
| AUTH USER (SEMUA ROLE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->name('super.admin.')
    ->group(function () {

        Route::get('/dashboard', fn () => view('db_sp_admin'))
            ->name('dashboard');

        Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| DISPLAY ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:display'])->group(function () {

    Route::get('/display', fn () => view('landing page IPTV'))
        ->name('display.dashboard');
});

/*
|--------------------------------------------------------------------------
| API (WEB)
|--------------------------------------------------------------------------
*/

Route::get('/wilayah', [ApiController::class, 'daftarWilayah']);
Route::get('/paket/wilayah/{wilayahId?}', [ApiController::class, 'paketBerdasarkanWilayah']);
Route::post('/tamu', [ApiController::class, 'simpanTamu']);
Route::get('/admin/tamu', [ApiController::class, 'daftarTamuAdmin']);

Route::get('/test-api', fn () => 'API TERBACA');

/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
