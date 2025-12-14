<div class="sidebar">

    {{-- MENU --}}
    <a href="{{ route('beranda') }}"
       class="nav-item {{ request()->routeIs('beranda') ? 'active' : '' }}">
        <img src="https://img.icons8.com/fluency/48/home.png">
        Beranda
    </a>

    <a href="{{ route('restoran.restoran') }}"
       class="nav-item {{ request()->routeIs('restoran.restoran') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/restaurant.png">
        Restoran
    </a>

    <a href="{{ route('layanan.layanan') }}"
       class="nav-item {{ request()->routeIs('layanan.layanan') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/customer-support.png">
        Layanan
    </a>

    <a href="{{ route('fasilitas.fasilitas') }}"
       class="nav-item {{ request()->routeIs('fasilitas.fasilitas') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/hotel-information.png">
        Fasilitas
    </a>

    <a href="{{ route('tvnfilm.tvnfilm') }}"
       class="nav-item {{ request()->routeIs('tvnfilm.tvnfilm') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/tv.png">
        TV & Film
    </a>

    <a href="{{ route('yt.yt') }}"
       class="nav-item {{ request()->routeIs('yt.yt') ? 'active' : '' }}">
        <img src="https://img.icons8.com/color/48/youtube-play.png">
        YouTube
    </a>

    <a href="{{ route('iptv') }}"
       class="nav-item">
        <img src="https://img.icons8.com/fluency/48/return.png">
        Kembali
    </a>

    {{-- GARIS PEMISAH --}}
    <hr class="sidebar-divider">

    {{-- LOGOUT --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            onclick="return confirm('Yakin mau logout?')"
            class="nav-item logout">
            <img src="https://img.icons8.com/fluency/48/logout-rounded-left.png">
            Logout
        </button>
    </form>

</div>
