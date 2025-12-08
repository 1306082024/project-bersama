@extends('all.main')

@section('content')

<div class="header-top">
    <div>
        <div class="welcome">Selamat Datang di Layanan Gintara</div>
        <div class="subtitle">Semoga masa menginap Anda menyenangkan.</div>
    </div>

    <div style="text-align:right;">
        <div class="clock" id="clock">--:--</div>
        <div class="date" id="date">Memuat...</div>
    </div>
</div>

<div class="card-row">
</div>

<div class="card-row">
    <div class="card">
            <img class="card-icon" src="https://img.icons8.com/color/96/customer-support.png">
            <h3>Layanan Kamar</h3>
            <p>Hubungi staff untuk bantuan & kebutuhan Anda</p>
        </div>
</div>

<div class="promo">
    <h2>Diskon 20% Spa & Wellness</h2>
    <p>Manjakan diri Anda dengan perawatan spa premium kami.</p>
    <a class="btn">Lihat Detail</a>
    <div class="promo-bg">Spa</div>
</div>

@endsection
