<aside class="sidebar">
    <div class="brand">
        <div class="brand-text">Gintara Admin</div>
    </div>

    <nav class="nav">
        <div class="nav-label">Menu Utama</div>
        
        <a href="{{ route('admin.dashboard') }}" 
           class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon">📊</span> Dashboard
        </a>

        <a href="{{ route('admin.pendaftaran') }}" 
           class="nav-item {{ request()->routeIs('admin.pendaftaran') ? 'active' : '' }}">
            <span class="nav-icon">📝</span> Pendaftaran
        </a>

        <a href="{{ route('admin.pelanggan') }}" 
           class="nav-item {{ request()->routeIs('admin.pelanggan') ? 'active' : '' }}">
            <span class="nav-icon">👥</span> Data Pelanggan
        </a>

        <a href="{{ route('admin.wilayah') }}" 
           class="nav-item {{ request()->routeIs('admin.wilayah') ? 'active' : '' }}">
            <span class="nav-icon">🌍</span> Kelola Wilayah
        </a>

        <a href="{{ route('admin.paket') }}" 
           class="nav-item {{ request()->routeIs('admin.paket') ? 'active' : '' }}">
            <span class="nav-icon">📦</span> Paket Internet
        </a>

        <div class="nav-label">System</div>
        
        <a href="{{ route('admin.pengaturan') }}" 
           class="nav-item {{ request()->routeIs('admin.pengaturan') ? 'active' : '' }}">
            <span class="nav-icon">⚙️</span> Pengaturan
        </a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="nav-item" style="background:none; border:none; width:100%; text-align:left; cursor:pointer;">
                <span class="nav-icon">🚪</span> Logout
            </button>
        </form>
    </nav>
</aside>