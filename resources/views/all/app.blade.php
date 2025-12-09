<div class="sidebar">

    <!-- <div class="sidebar-logo">
        <img src="{{ asset('images/gintara.png') }}">
    </div>

    <div class="nav-title">Menu Utama</div> -->

    <a href="{{ route('beranda') }}" class="nav-item {{ request()->routeIs('beranda') ? 'active' : '' }}">
        <img src="https://img.icons8.com/fluency/48/home.png"> Beranda
    </a>

    <a href="{{ route('restoran.restoran') }}" class="nav-item {{ request()->routeIs('restoran') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/restaurant.png"> Restoran
    </a>

    <a href="{{ route('layanan.layanan') }}" class="nav-item {{ request()->routeIs('layanan') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/customer-support.png"> Layanan
    </a>

    <a href="{{ route('fasilitas.fasilitas') }}" class="nav-item {{ request()->routeIs('fasilitas') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/hotel-information.png"> Fasilitas
    </a>

    <a href="{{ route('tvnfilm.tvnfilm') }}" class="nav-item {{ request()->routeIs('tvnfilm') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/tv.png"> TV & Film
    </a>

    <a href="{{ route('yt.yt') }}" class="nav-item {{ request()->routeIs('yt') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/youtube-play.png"> YouTube
    </a>

    <a href="{{ route('iptv') }}" class="nav-item {{ request()->routeIs('beranda') ? 'active' : '' }}">
        <img src="https://img.icons8.com/fluency/48/return.png"> Kembali
    </a>

</div>
