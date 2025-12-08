@extends('all.main')

@section('content')

<div class="header-top">
    <div>
        <div class="welcome">Selamat Datang di Hotel Gintara</div>
        <div class="subtitle">Semoga masa menginap Anda menyenangkan.</div>
    </div>

    <div style="text-align:right;">
        <div class="clock" id="clock">--:--</div>
        <div class="date" id="date">Memuat...</div>
    </div>
</div>

<div class="card-row">
    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/fluency/96/sun.png">
        <div class="card-value" id="weather">--°C</div>
        <div id="weather-desc">Cirebon</div>
    </div>

    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/96/bed.png">
        <div class="card-title">Kamar Anda</div>
        <div class="card-value">808</div>
        <div>Tipe: Deluxe Suite</div>
    </div>

    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/fluency/96/wifi.png">
        <div class="card-title">Akses Wi-Fi</div>
        <div class="card-value">Hotel_WiFi</div>
        <div>Password: <b>12345678</b></div>
    </div>
</div>

<div class="card-row">
    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/96/restaurant.png">
        <h3>Pesan Makanan</h3>
        <p>Lihat menu dan pesan ke kamar</p>
    </div>

    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/96/customer-support.png">
        <h3>Layanan Kamar</h3>
        <p>Hubungi staff untuk bantuan & kebutuhan Anda</p>
    </div>

    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/48/hotel-information.png">
        <h3>Info Fasilitas</h3>
        <p>Kolam renang, gym, spa</p>
    </div>

</div>

<div class="card-row">
    
    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/96/tv.png">
        <h3>TV & Film</h3>
        <p>Tonton berbagai channel & film</p>
    </div>
    <div class="card">
        <img class="card-icon" src="https://img.icons8.com/color/96/youtube-play.png">
        <h3>YouTube</h3>
        <p>Tonton video favorit Anda</p>
    </div>


</div>

<div class="promo">
    <h2>Diskon 20% Spa & Wellness</h2>
    <p>Manjakan diri Anda dengan perawatan spa premium kami.</p>
    <a class="btn">Lihat Detail</a>
    <div class="promo-bg">Spa</div>
</div>


@endsection