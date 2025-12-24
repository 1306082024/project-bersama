<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AfoodController;
use App\Http\Controllers\AroomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AguestController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sp_adminController;
use App\Http\Controllers\FoodOrderController;

/*
|--------------------------------------------------------------------------
| ROOT (AUTO REDIRECT SESUAI ROLE)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return match (auth()->user()->role) {
            'super admin' => redirect()->route('super.admin.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'display' => redirect()->route('display.dashboard'),
            default => abort(403),
        };
    }

    return redirect()->route('login');
});


// --- HALAMAN UMUM  ---
Route::get('/pendaftaran', function () { return view('formulirpendaftaran.pendaftaran'); });
Route::get('/lapor', function () { return view('formulirpendaftaran.lapor'); });
Route::get('/loginP', function () { return view('formulirpendaftaran.login'); })->name('loginP');
Route::post('/loginP', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// --- ADMIN ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboardA', function () { return view('formulirpendaftaran.admin.dashboard'); });
    Route::get('/admin/data-pendaftar', function () { return view('formulirpendaftaran.admin.data-pendaftar'); });
    Route::get('/admin/data-teknisi', function () { return view('formulirpendaftaran.admin.data-teknisi'); });
    Route::get('/admin/paket', function () { return view('formulirpendaftaran.admin.paket'); });
    Route::get('/admin/pelanggan', function () { return view('formulirpendaftaran.admin.pelanggan'); });
    Route::get('/admin/pengaturan', function () { return view('formulirpendaftaran.admin.pengaturan'); });
    Route::get('/admin/wilayah', function () { return view('formulirpendaftaran.admin.wilayah'); });
    Route::get('/admin/laporan-instalasi', function () { return view('formulirpendaftaran.admin.laporan-instalasi'); });
});


// --- TEKNISI ---
Route::middleware(['auth', 'role:teknisi'])->group(function () {
    Route::get('/teknisi', function () { return view('formulirpendaftaran.teknisi.dashboard'); });
    Route::get('/teknisi/tugas', function () { return view('formulirpendaftaran.teknisi.tugas'); });
    Route::get('/teknisi/gangguan', function () { return view('formulirpendaftaran.teknisi.gangguan'); });
    Route::get('/teknisi/riwayat', function () { return view('formulirpendaftaran.teknisi.riwayat'); });
    Route::get('/teknisi/inventaris', function () { return view('formulirpendaftaran.teknisi.inventaris'); });
    Route::get('/teknisi/peralatan', function () { return view('formulirpendaftaran.teknisi.peralatan'); });
    Route::get('/teknisi/profil', function () { return view('formulirpendaftaran.teknisi.profil'); });
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

        Route::get('/dashboard', fn() => view('db_sp_admin'))
            ->name('dashboard');

        Route::resource('users', UserController::class);
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->name('super.admin.')
    ->group(function () {

        Route::resource('rooms', RoomController::class);
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->name('super.admin.')
    ->group(function () {
        Route::resource('guests', GuestController::class);
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->group(function () {

        Route::resource('food-orders', FoodOrderController::class)
            ->names('super.admin.food-orders');
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->group(function () {

        Route::resource('hotels', HotelController::class)
            ->names('super.admin.hotels');
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->group(function () {

        Route::resource('channels', ChannelController::class)
            ->names('super.admin.channels');
    });

Route::middleware(['auth', 'role:super admin'])
    ->prefix('super-admin')
    ->name('super.admin.')
    ->group(function () {
        Route::get(
            '/dashboard',
            [Sp_adminController::class, 'index']
        )->name('dashboard');
    });


/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
// */
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('rooms', AroomController::class);
        Route::resource('guests', AguestController::class);
        Route::resource('food-orders', AfoodController::class);
    });

Route::get(
    '/admin/hotels/{hotel}/rooms',
    [RoomController::class, 'byHotel']
)->name('admin.hotels.rooms');

Route::get('/admin/hotels/{hotel}/rooms', function ($hotelId) {
    return \App\Models\Room::where('hotel_id', $hotelId)
        ->where('status', 'kosong')
        ->orderBy('no_kamar')
        ->get(['id', 'no_kamar', 'tipe_kamar']);
});



/*
|--------------------------------------------------------------------------
| DISPLAY ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:display'])->group(function () {

    Route::get('/display', fn() => view('landing page IPTV'))
        ->name('display.dashboard');
});

Route::get('/display/{room}', [DisplayController::class, 'show'])
    ->name('display.show');

/*
|--------------------------------------------------------------------------
| API (WEB)
|--------------------------------------------------------------------------
*/


Route::get('/test-api', fn() => 'API TERBACA');

/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

