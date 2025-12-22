<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Paket Internet - Admin Gintara</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #0b6fd6;
      --primary-dark: #074e9e;
      --secondary: #1190ff;
      --bg-body: #f4f7fa;
      --bg-card: #ffffff;
      --text-main: #1f2937;
      --text-muted: #6b7280;
      --border: #e5e7eb;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --sidebar-width: 260px;
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    }

    * { box-sizing: border-box; }
    
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: var(--bg-body);
      color: var(--text-main);
      display: flex;
      min-height: 100vh;
    }

    /* --- SIDEBAR --- */
    .sidebar {
      width: var(--sidebar-width);
      background: var(--bg-card);
      border-right: 1px solid var(--border);
      position: fixed;
      height: 100%;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      z-index: 10;
    }

    .brand {
      padding: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-bottom: 1px solid var(--border);
    }

    .brand-logo {
      width: 40px;
      height: 40px;
      background: var(--primary);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 800;
    }

    .brand-text {
      font-size: 18px;
      font-weight: 700;
      color: var(--primary);
    }

    .nav {
      padding: 20px 16px;
      flex: 1;
    }

    .nav-label {
      font-size: 11px;
      text-transform: uppercase;
      color: var(--text-muted);
      letter-spacing: 0.5px;
      margin-bottom: 10px;
      margin-left: 12px;
      font-weight: 600;
    }

    .nav-item {
      display: flex;
      align-items: center;
      padding: 12px;
      color: var(--text-muted);
      text-decoration: none;
      border-radius: 8px;
      margin-bottom: 4px;
      font-size: 14px;
      font-weight: 500;
      transition: 0.2s;
    }

    .nav-item:hover {
      background: #f0f7ff;
      color: var(--primary);
    }

    .nav-item.active {
      background: var(--primary);
      color: white;
      box-shadow: 0 4px 12px rgba(11, 111, 214, 0.2);
    }

    .nav-icon {
      margin-right: 12px;
      width: 20px;
      text-align: center;
    }

    /* --- MAIN CONTENT --- */
    .main {
      margin-left: var(--sidebar-width);
      flex: 1;
      padding: 30px;
      max-width: 100%;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 24px;
      margin: 0;
      color: #111827;
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #e0e7ff;
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }

    /* --- CARDS --- */
    .grid-cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background: var(--bg-card);
      border-radius: 12px;
      padding: 20px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
    }

    .card h3 {
      margin: 0 0 6px 0;
      font-size: 18px;
    }

    .card p { margin: 0 0 10px 0; color:#666; font-size:14px; }

    .price {
      font-size: 24px;
      font-weight: 700;
      margin: 10px 0;
    }

    .card ul { font-size:13px; color:#555; padding-left:20px; margin-bottom:15px; }

    .btn { padding:8px 12px; border-radius:8px; border:1px solid var(--border); background:white; cursor:pointer; font-size:13px; }
    .btn-primary { background:var(--primary); color:white; border:none; }

    .badge { padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600; display:inline-block; }
    .bg-green { background:#dcfce7; color:#15803d; }

    /* small form control inside card */
    .field { display:flex; gap:8px; align-items:center; margin-bottom:10px; }
    .select { padding:8px; border-radius:8px; border:1px solid var(--border); background:white; font-size:13px; }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .grid-cards { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main { margin-left: 0; padding: 20px; }
      .header h1 { font-size: 20px; }
    }
  </style>
</head>
<body>
  <aside class="sidebar">
    <nav class="nav">
      <a href="dashboardA" class="nav-item">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Data Pendaftar
      </a>
      <a href="pelanggan" class="nav-item">
        <span class="nav-icon">👥</span> Data Pelanggan
      </a>
      <a href="wilayah" class="nav-item">
        <span class="nav-icon">🌍</span> Kelola Wilayah
      </a>
      <a href="paket" class="nav-item active">
        <span class="nav-icon">📦</span> Paket Internet
      </a>
      <div class="nav-label" style="margin-top:20px">Settings</div>
      <a href="pengaturan" class="nav-item">
        <span class="nav-icon">⚙️</span> Pengaturan
      </a>
      <a href="#" class="nav-item">
        <span class="nav-icon">🚪</span> Logout
      </a>
    </nav>
  </aside>

  <main class="main">
    <div class="header">
      <div>
        <h1>Paket Internet Tersedia</h1>
        <p style="margin:4px 0 0; color:var(--text-muted); font-size:14px">Pilih wilayah (Klayan Tahap 1–5) untuk melihat harga per zona.</p>
      </div>
      <div class="user-profile">
        <div style="text-align:right">
          <div style="font-weight:600;font-size:14px">Administrator</div>
          <div style="font-size:12px;color:var(--text-muted)">Admin</div>
        </div>
        <div class="avatar">A</div>
      </div>
    </div>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
      <div></div>
      <button class="btn btn-primary">+ Buat Paket Baru</button>
    </div>

    <div class="grid-cards">

      <!-- Paket Super Hemat -->
      <div class="card" style="border-top:4px solid #0b6fd6;">
        <div style="display:flex;justify-content:space-between;align-items:start">
          <h3>Paket Hemat</h3>
          <span class="badge bg-green">Aktif</span>
        </div>
        <p>.</p>

        <div class="field">
          <label for="wilayah-hemat" style="min-width:80px;color:var(--text-muted);font-size:13px">Wilayah</label>
          <select id="wilayah-hemat" class="select select-wilayah" data-package="hemat">
            <option selected>Klayan Tahap 1</option>
            <option>Klayan Tahap 2</option>
            <option>Klayan Tahap 3</option>
            <option>Klayan Tahap 4</option>
            <option>Klayan Tahap 5</option>
          </select>
        </div>

        <div class="price" id="price-hemat">Rp 170.000 <span style="font-size:14px;color:#999;font-weight:400">/bulan</span></div>

        <ul>
          <li>Kecepatan Download & Upload hingga ekstra speed 60Mbps</li>
          <li>Kuota Unlimited</li>
          <li>Full Support 24jam</li>
        </ul>

        <button class="btn" style="width:100%">Edit Paket</button>
      </div>

      <!-- Paket Hemat -->
      <div class="card" style="border-top:4px solid #24a0ff;">
        <div style="display:flex;justify-content:space-between;align-items:start">
          <h3>Paket Puas</h3>
          <span class="badge bg-green">Aktif</span>
        </div>
        <p>.</p>

        <div class="field">
          <label for="wilayah-hemat" style="min-width:80px;color:var(--text-muted);font-size:13px">Wilayah</label>
          <select id="wilayah-hemat" class="select select-wilayah" data-package="hemat">
            <option>Klayan Tahap 1</option>
            <option selected>Klayan Tahap 2</option>
            <option>Klayan Tahap 3</option>
            <option>Klayan Tahap 4</option>
            <option>Klayan Tahap 5</option>
          </select>
        </div>

        <div class="price" id="price-hemat">Rp 220.000 <span style="font-size:14px;color:#999;font-weight:400">/bulan</span></div>

        <ul>
          <li>Kecepatan Download & Upload hingga ekstra speed 120 Mbps</li>
          <li>Kuota Unlimited</li>
          <li>FUll Support 24 jam</li>
        </ul>

        <button class="btn" style="width:100%">Edit Paket</button>
      </div>

      <!-- Paket Puas -->
      <div class="card" style="border-top:4px solid #1190ff;">
        <div style="display:flex;justify-content:space-between;align-items:start">
          <h3>Paket Mantap</h3>
          <span class="badge bg-green">Aktif</span>
        </div>
        <p>.</p>

        <div class="field">
          <label for="wilayah-puas" style="min-width:80px;color:var(--text-muted);font-size:13px">Wilayah</label>
          <select id="wilayah-puas" class="select select-wilayah" data-package="puas">
            <option>Klayan Tahap 1</option>
            <option>Klayan Tahap 2</option>
            <option selected>Klayan Tahap 3</option>
            <option>Klayan Tahap 4</option>
            <option>Klayan Tahap 5</option>
          </select>
        </div>

        <div class="price" id="price-puas">Rp 310.000 <span style="font-size:14px;color:#999;font-weight:400">/bulan</span></div>

        <ul>
          <li>Kecepatan Download & Upload hingga ekstra speed 180 Mbps</li>
          <li>Kuota Unlimited</li>
          <li>Full Support 24 jam</li>
        </ul>

        <button class="btn" style="width:100%">Edit Paket</button>
      </div>

      <!-- Paket Mantap -->
      <div class="card" style="border-top:4px solid #06a6ff;">
        <div style="display:flex;justify-content:space-between;align-items:start">
          <h3>Paket Ganas</h3>
          <span class="badge bg-green">Aktif</span>
        </div>
        <p>.</p>

        <div class="field">
          <label for="wilayah-mantap" style="min-width:80px;color:var(--text-muted);font-size:13px">Wilayah</label>
          <select id="wilayah-mantap" class="select select-wilayah" data-package="mantap">
            <option>Klayan Tahap 1</option>
            <option>Klayan Tahap 2</option>
            <option>Klayan Tahap 3</option>
            <option selected>Klayan Tahap 4</option>
            <option>Klayan Tahap 5</option>
          </select>
        </div>

        <div class="price" id="price-mantap">Rp 350.000 <span style="font-size:14px;color:#999;font-weight:400">/bulan</span></div>

        <ul>
          <li>Kecepatan Download & Upload hingga ekstra speed 300 Mbps</li>
          <li>Kuota Unlimited</li>
          <li>Full Support 24 jam</li>
        </ul>

        <button class="btn" style="width:100%">Edit Paket</button>
      </div>

      <!-- Paket Sultan -->
      <div class="card" style="border-top:4px solid #005bbb;">
        <div style="display:flex;justify-content:space-between;align-items:start">
          <h3>Paket Sultan</h3>
          <span class="badge bg-green">Aktif</span>
        </div>
        <p>.</p>

        <div class="field">
          <label for="wilayah-sultan" style="min-width:80px;color:var(--text-muted);font-size:13px">Wilayah</label>
          <select id="wilayah-sultan" class="select select-wilayah" data-package="sultan">
            <option>Klayan Tahap 1</option>
            <option>Klayan Tahap 2</option>
            <option>Klayan Tahap 3</option>
            <option>Klayan Tahap 4</option>
            <option selected>Klayan Tahap 5</option>
          </select>
        </div>

        <div class="price" id="price-sultan">Rp 1.000.000 <span style="font-size:14px;color:#999;font-weight:400">/bulan</span></div>

        <ul>
          <li>Speed 600 Mbps</li>
          <li>Kuota Unlimited</li>
          <li>Full Support 24 jam</li>
        </ul>

        <button class="btn" style="width:100%">Edit Paket</button>
      </div>

    </div>
  </main>
</body>
</html>
