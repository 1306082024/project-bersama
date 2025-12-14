<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Pelanggan - Admin Gintara</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #0b6fd6;
      --primary-dark: #074e9e;
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

    /* SIDEBAR */
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
    .brand { padding: 24px; display:flex; align-items:center; gap:12px; border-bottom:1px solid var(--border); }
    .brand-logo { width:40px;height:40px;background:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;color:white;font-weight:800; }
    .brand-text { font-size:18px;font-weight:700;color:var(--primary); }

    .nav { padding:20px 16px; flex:1; }
    .nav-label { font-size:11px; text-transform:uppercase; color:var(--text-muted); letter-spacing:0.5px; margin-bottom:10px; margin-left:12px; font-weight:600; }
    .nav-item { display:flex; align-items:center; padding:12px; color:var(--text-muted); text-decoration:none; border-radius:8px; margin-bottom:4px; font-size:14px; font-weight:500; transition:0.2s; }
    .nav-item:hover { background:#f0f7ff; color:var(--primary); }
    .nav-item.active { background:var(--primary); color:white; box-shadow:0 4px 12px rgba(11,111,214,0.2); }
    .nav-icon { margin-right:12px; width:20px; text-align:center; }

    /* MAIN */
    .main { margin-left: var(--sidebar-width); flex:1; padding:30px; max-width:100%; }
    .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
    .header h1 { font-size:24px; margin:0; color:#111827; }
    .user-profile { display:flex; align-items:center; gap:12px; }
    .avatar { width:40px;height:40px;border-radius:50%;background:#e0e7ff;color:var(--primary);display:flex;align-items:center;justify-content:center;font-weight:700; }

    /* Card & Table */
    .card { background:var(--bg-card); border-radius:12px; padding:20px; border:1px solid var(--border); box-shadow:var(--shadow); }
    .table-container { overflow-x:auto; }
    table { width:100%; border-collapse:collapse; font-size:14px; }
    th { text-align:left; padding:14px 16px; color:var(--text-muted); font-weight:600; border-bottom:1px solid var(--border); background:#f9fafb; }
    td { padding:14px 16px; border-bottom:1px solid var(--border); color:var(--text-main); vertical-align:middle; }

    .btn { padding:6px 12px; border-radius:6px; border:1px solid var(--border); background:white; cursor:pointer; font-size:12px; }
    .btn-primary { background:var(--primary); color:white; border:none; }

    .badge { padding:4px 10px; border-radius:20px; font-size:12px; font-weight:600; display:inline-block; }
    .badge-blue { background:#e0f2fe; color:#0369a1; }
    .badge-green { background:#dcfce7; color:#15803d; }
    .badge-yellow { background:#fef3c7; color:#b45309; }
    .badge-red { background:#fee2e2; color:#dc2626; }

    /* Responsive */
    @media (max-width: 900px) { .main { padding:20px; } }
    @media (max-width: 768px) { .sidebar { display:none; } .main { margin-left:0; padding:20px; } .header h1 { font-size:20px; } }
  </style>
</head>
<body>

  <aside class="sidebar">
    <nav class="nav">
      <a href="tes" class="nav-item">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Pendaftaran
      </a>
      <a href="pelanggan" class="nav-item active">
        <span class="nav-icon">👥</span> Data Pelanggan
      </a>
      <a href="wilayah1" class="nav-item">
        <span class="nav-icon">🌍</span> Kelola Wilayah
      </a>
      <a href="paket" class="nav-item">
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
    <header class="header">
      <div>
        <h1>Pelanggan</h1>
        <p style="margin:4px 0 0; color:var(--text-muted); font-size:14px">
          Daftar pelanggan diambil dari data pendaftar.
        </p>
      </div>
      <div class="user-profile">
        <div style="text-align:right">
          <div style="font-weight:600;font-size:14px">Administrator</div>
          <div style="font-size:12px;color:var(--text-muted)">Admin</div>
        </div>
        <div class="avatar">A</div>
      </div>
    </header>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
      <div style="display:flex; gap:10px; align-items:center;">
        <input type="text" placeholder="Cari nama/ID/Alamat..." style="padding:8px; border-radius:8px; border:1px solid var(--border); width:300px;">
        <select style="padding:8px; border-radius:8px; border:1px solid var(--border);">
          <option>Semua Status</option>
          <option>Aktif</option>
          <option>Telat Bayar</option>
          <option>Non-aktif</option>
          <option>Batal</option>
        </select>
        <button class="btn btn-primary">Filter</button>
      </div>
      <div>
        <button class="btn">+ Impor / Export</button>
        <button class="btn">Export CSV</button>
      </div>
    </div>

    <div class="card">
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID Pelanggan</th>
              <th>Nama & Kontak</th>
              <th>Alamat Pemasangan</th>
              <th>Paket</th>
              <th>Jatuh Tempo</th>
              <th>Status</th>
              <th>Maps</th>
              <th>Aksi</th>
            </tr>
          </thead>
              <tbody>
            <tr>
              <td>#TRS-003</td>
              <td>
                <strong>Ahmad Fauzi</strong><br>
                <span style="font-size:12px;color:#6b7280">📞 0813-4455-6677</span><br>
                <span style="font-size:12px;color:#6b7280">✉️ ahmad@email.com</span>
              </td>
              <td>
                <strong>Trusmiland Klayan – Tahap 1</strong><br>
                Blok B No.8<br>
                RT 01 / RW 02<br>
                Desa Klayan<br>
                Kec. Gunungjati<br>
                Kab. Cirebon
              </td>
              <td>Paket Hemat</td>
              <td>07 setiap bulan</td>
              <td><span class="badge badge-green">Aktif</span></td>
              <td><a href="#" class="btn">📍 Maps</a></td>
              <td>
                <button class="btn">Edit</button>
                <button class="btn">Detail</button>
              </td>
            </tr>

            <tr>
              <td>#TRS-004</td>
              <td>
                <strong>Siti Nurhaliza</strong><br>
                <span style="font-size:12px;color:#6b7280">📞 0821-8899-1122</span><br>
                <span style="font-size:12px;color:#6b7280">✉️ siti@email.com</span>
              </td>
              <td>
                <strong>Trusmiland Klayan – Tahap 2</strong><br>
                Blok E No.19<br>
                RT 03 / RW 04<br>
                Desa Klayan<br>
                Kec. Gunungjati<br>
                Kab. Cirebon
              </td>
              <td>Paket Puas</td>
              <td>10 setiap bulan</td>
              <td><span class="badge badge-yellow">Telat Bayar</span></td>
              <td><a href="#" class="btn">📍 Maps</a></td>
              <td>
                <button class="btn">Tagih</button>
                <button class="btn">Detail</button>
              </td>
            </tr>

            <tr>
              <td>#TRS-005</td>
              <td>
                <strong>Dedi Kurniawan</strong><br>
                <span style="font-size:12px;color:#6b7280">📞 0852-3344-5566</span><br>
                <span style="font-size:12px;color:#6b7280">✉️ dedi@email.com</span>
              </td>
              <td>
                <strong>Trusmiland Klayan – Tahap 3</strong><br>
                Blok G No.14<br>
                RT 02 / RW 05<br>
                Desa Klayan<br>
                Kec. Gunungjati<br>
                Kab. Cirebon
              </td>
              <td>Paket Mantap</td>
              <td>15 setiap bulan</td>
              <td><span class="badge badge-green">Aktif</span></td>
              <td><a href="#" class="btn">📍 Maps</a></td>
              <td>
                <button class="btn">Edit</button>
                <button class="btn">Detail</button>
              </td>
            </tr>

            <tr>
              <td>#TRS-006</td>
              <td>
                <strong>Rina Marlina</strong><br>
                <span style="font-size:12px;color:#6b7280">📞 0819-6677-8899</span><br>
                <span style="font-size:12px;color:#6b7280">✉️ rina@email.com</span>
              </td>
              <td>
                <strong>Trusmiland Klayan – Tahap 4</strong><br>
                Blok C No.6<br>
                RT 04 / RW 01<br>
                Desa Klayan<br>
                Kec. Gunungjati<br>
                Kab. Cirebon
              </td>
              <td>Paket Hemat</td>
              <td>20 setiap bulan</td>
              <td><span class="badge badge-green">Aktif</span></td>
              <td><a href="#" class="btn">📍 Maps</a></td>
              <td>
                <button class="btn">Edit</button>
                <button class="btn">Detail</button>
              </td>
            </tr>

            </tbody>


        </table>
      </div>
    </div>

  </main>
</body>
</html>
