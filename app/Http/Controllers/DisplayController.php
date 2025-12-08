<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function beranda()
    {
        return view('beranda'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function restoran()
    {
        return view('restoran.restoran'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function layanan()
    {
        return view('layanan.layanan'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function fasilitas()
    {
        return view('fasilitas.fasilitas'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function tvnfilm()
    {
        return view('tvnfilm.tvnfilm'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function yt()
    {
        return view('yt.yt'); // pastikan file resources/views/beranda.blade.php ada
    }
}
