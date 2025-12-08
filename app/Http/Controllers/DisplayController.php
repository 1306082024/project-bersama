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
        return view('restoran'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function layanan()
    {
        return view('layanan'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function fasilitas()
    {
        return view('fasilitas'); // pastikan file resources/views/beranda.blade.php ada
    }

    public function tvnfilm()
    {
        return view('tvnfilm'); // pastikan file resources/views/beranda.blade.php ada
    }
    
    public function yt()
    {
        return view('yt'); // pastikan file resources/views/beranda.blade.php ada
    }
}
