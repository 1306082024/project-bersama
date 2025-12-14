<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gintara Admin Dashboard</title>
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

    /* --- STATS CARDS --- */
    .grid-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
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

    .stat-head {
      display: flex;
      justify-content: space-between;
      align-items: start;
      margin-bottom: 12px;
    }

    .stat-title {
      font-size: 13px;
      color: var(--text-muted);
      font-weight: 500;
    }

    .stat-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
    }

    .stat-value {
      font-size: 28px;
      font-weight: 700;
      color: #111827;
      margin: 0;
    }

    .stat-desc {
      font-size: 12px;
      margin-top: 6px;
    }

    .text-up { color: var(--success); }
    .text-down { color: var(--danger); }

    /* --- CHARTS AREA --- */
    .grid-charts {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }

    .chart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .chart-title {
      font-size: 16px;
      font-weight: 600;
      margin: 0;
    }

    /* CSS BAR CHART */
    .bar-chart {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      height: 200px;
      padding-top: 20px;
      gap: 10px;
    }

    .bar-group {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
      height: 100%;
      justify-content: flex-end;
    }

    .bar-value {
  position: absolute;
    top: -18px;
    width: 100%;
    text-align: center;
    font-size: 12px;
    font-weight: 600;
    color: #111827;
    }

    .bar {
      width: 100%;
      max-width: 40px;
      background: var(--primary);
      border-radius: 6px 6px 0 0;
      position: relative;
      transition: height 0.3s ease;
      opacity: 0.85;
    }
    .bar:hover { opacity: 1; transform: scaleY(1.02); }

    .bar-label {
      margin-top: 10px;
      font-size: 12px;
      color: var(--text-muted);
    }

    /* SVG LINE CHART SIMULATION */
    .line-chart-container {
      position: relative;
      height: 200px;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .donut-chart {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: conic-gradient(
        var(--primary) 0% 60%, 
        #3b82f6 60% 85%, 
        #93c5fd 85% 100%
      );
      position: relative;
    }
    
    .donut-inner {
      position: absolute;
      width: 110px;
      height: 110px;
      background: white;
      border-radius: 50%;
      top: 20px;
      left: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    /* --- TABLE --- */
    .table-container {
      overflow-x: auto;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    th {
      text-align: left;
      padding: 14px 16px;
      color: var(--text-muted);
      font-weight: 600;
      border-bottom: 1px solid var(--border);
      background: #f9fafb;
    }

    td {
      padding: 16px;
      border-bottom: 1px solid var(--border);
      color: var(--text-main);
    }

    .badge {
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-blue { background: #e0f2fe; color: #0369a1; }
    .badge-green { background: #dcfce7; color: #15803d; }
    .badge-yellow { background: #fef3c7; color: #b45309; }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .grid-charts { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
      .sidebar { display: none; } /* Hide sidebar for demo simplicity */
      .main { margin-left: 0; padding: 20px; }
      .header h1 { font-size: 20px; }
    }
  </style>
</head>
<body>

  <aside class="sidebar">
    <nav class="nav">
      <a href="tes" class="nav-item active">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Pendaftaran
      </a>
      <a href="pelanggan" class="nav-item">
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
        <h1>Dashboard</h1>
        <p style="margin:4px 0 0; color:var(--text-muted); font-size:14px">Halo Admin, berikut update hari ini.</p>
      </div>
      <div class="user-profile">
        <div style="text-align:right">
          <div style="font-weight:600;font-size:14px">Administrator</div>
          <div style="font-size:12px;color:var(--text-muted)">Admin</div>
        </div>
        <div class="avatar">A</div>
      </div>
    </header>

    <div class="grid-stats">
      <div class="card">
        <div class="stat-head">
          <div class="stat-title">TOTAL PENDAFTAR</div>
          <div class="stat-icon" style="background:#e0f2fe;color:#0284c7">📝</div>
        </div>
        <h2 class="stat-value">124</h2>
        <div class="stat-desc text-up">▲ 12% dari bulan lalu</div>
      </div>
      
      <div class="card">
        <div class="stat-head">
          <div class="stat-title">MENUNGGU INSTALASI</div>
          <div class="stat-icon" style="background:#fef3c7;color:#d97706">🛠</div>
        </div>
        <h2 class="stat-value">8</h2>
        <div class="stat-desc" style="color:var(--text-muted)">Jadwal minggu ini</div>
      </div>

      <div class="card">
        <div class="stat-head">
          <div class="stat-title">PELANGGAN AKTIF</div>
          <div class="stat-icon" style="background:#dcfce7;color:#16a34a">✅</div>
        </div>
        <h2 class="stat-value">892</h2>
        <div class="stat-desc text-up">▲ 5% Penambahan</div>
      </div>

      <div class="card">
        <div class="stat-head">
          <div class="stat-title">TIKET KENDALA</div>
          <div class="stat-icon" style="background:#fee2e2;color:#dc2626">⚠️</div>
        </div>
        <h2 class="stat-value">3</h2>
        <div class="stat-desc text-down">▼ Turun (Kinerja Bagus)</div>
      </div>
    </div>

    <div class="grid-charts">
      
      <div class="card">
        <div class="chart-header">
          <h3 class="chart-title">Statistik Pendaftaran (Mingguan)</h3>
          <select style="border:1px solid #ddd; padding:4px; border-radius:6px; font-size:12px">
            <option>7 Hari Terakhir</option>
            <option>Bulan Ini</option>
          </select>
        </div>
        
        <div class="bar-chart">
          <div class="bar-group">
  <div class="bar" style="height: 40%; background: #93c5fd;">
    <span class="bar-value">5</span>
  </div>
  <div class="bar-label">Sen</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 65%; background: #60a5fa;">
    <span class="bar-value">9</span>
  </div>
  <div class="bar-label">Sel</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 50%; background: #93c5fd;">
    <span class="bar-value">7</span>
  </div>
  <div class="bar-label">Rab</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 85%; background: #3b82f6;">
    <span class="bar-value">14</span>
  </div>
  <div class="bar-label">Kam</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 100%; background: #0b6fd6;">
    <span class="bar-value">18</span>
  </div>
  <div class="bar-label">Jum</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 60%; background: #60a5fa;">
    <span class="bar-value">8</span>
  </div>
  <div class="bar-label">Sab</div>
</div>

<div class="bar-group">
  <div class="bar" style="height: 30%; background: #93c5fd;">
    <span class="bar-value">3</span>
  </div>
  <div class="bar-label">Min</div>
</div>
        </div>
      </div>

      <div class="card">
        <div class="chart-header">
          <h3 class="chart-title">Sebaran Paket</h3>
        </div>
        <div class="line-chart-container">
          <div class="donut-chart">
            <div class="donut-inner">
              <span style="font-weight:700;font-size:24px">892</span>
              <span style="font-size:12px;color:#888">Total</span>
            </div>
          </div>
        </div>
        <div style="display:flex; justify-content:center; gap:15px; font-size:12px; margin-top:10px">
          <div style="display:flex;align-items:center;gap:4px"><span style="width:8px;height:8px;border-radius:50%;background:#0b6fd6"></span> Mantap</div>
          <div style="display:flex;align-items:center;gap:4px"><span style="width:8px;height:8px;border-radius:50%;background:#3b82f6"></span> Puas</div>
          <div style="display:flex;align-items:center;gap:4px"><span style="width:8px;height:8px;border-radius:50%;background:#93c5fd"></span> Hemat</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="chart-header">
        <h3 class="chart-title">Pendaftaran Terbaru</h3>
        <button style="background:none;border:1px solid #ddd;padding:6px 12px;border-radius:6px;cursor:pointer;font-size:12px">Lihat Semua</button>
      </div>
      
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pemohon</th>
              <th>Wilayah</th>
              <th>Paket</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#REG-091</td>
              <td><strong>Budi Santoso</strong><br><span style="font-size:12px;color:#888">0812-3456-7890</span></td>
              <td>Klayan Tahap 1</td>
              <td>Paket Mantap</td>
              <td>09 Des 2025</td>
              <td><span class="badge badge-yellow">Pending</span></td>
              <td><button style="cursor:pointer;padding:4px 8px;border:1px solid #ddd;background:#fff;border-radius:4px">Detail</button></td>
            </tr>
            <tr>
              <td>#REG-090</td>
              <td><strong>Siti Aminah</strong><br><span style="font-size:12px;color:#888">0857-1122-3344</span></td>
              <td>Klayan Tahap 2</td>
              <td>Paket Hemat</td>
              <td>08 Des 2025</td>
              <td><span class="badge badge-green">Survey OK</span></td>
              <td><button style="cursor:pointer;padding:4px 8px;border:1px solid #ddd;background:#fff;border-radius:4px">Detail</button></td>
            </tr>
            <tr>
              <td>#REG-089</td>
              <td><strong>Ahmad Dani</strong><br><span style="font-size:12px;color:#888">0899-8877-6655</span></td>
              <td>Klayan Tahap 3</td>
              <td>Paket Puas</td>
              <td>08 Des 2025</td>
              <td><span class="badge badge-blue">Terpasang</span></td>
              <td><button style="cursor:pointer;padding:4px 8px;border:1px solid #ddd;background:#fff;border-radius:4px">Detail</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </main>

</body>
</html>