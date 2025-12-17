<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengaturan - Admin Gintara</title>

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

<!-- SIDEBAR -->
  <aside class="sidebar">
    <nav class="nav">
      <a href="tes" class="nav-item">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Data Pendaftar
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
      <a href="pengaturan" class="nav-item active">
        <span class="nav-icon">⚙️</span> Pengaturan
      </a>
      <a href="#" class="nav-item">
        <span class="nav-icon">🚪</span> Logout
      </a>
    </nav>
  </aside>

<!-- MAIN -->
<main class="main">

  <div class="header">
    <h2 style="margin:0">Pengaturan Admin</h2>

    <div style="display:flex; gap:12px; align-items:center;">
      <div style="text-align:right;">
        <div style="font-size:14px; font-weight:600;">Administrator</div>
        <div style="font-size:12px; color:var(--text-muted);">Admin</div>
      </div>
      <div class="avatar">A</div>
    </div>
  </div>

  <div class="card">

    <h3 style="margin-top:0; border-bottom:1px solid var(--border); padding-bottom:10px;">Profil Admin</h3>

    <form>
      <label>Nama Admin</label>
      <input type="text" value="Administrator" style="margin-bottom:15px;">

      <label>Email</label>
      <input type="email" value="admin@gintara.net" style="margin-bottom:15px;">

      <label>Password Baru</label>
      <input type="password" placeholder="Kosongkan jika tidak ingin mengubah">

      <div style="margin-top:20px; display:flex; gap:10px;">
        <button class="btn btn-primary">Simpan Perubahan</button>
        <button type="button" class="btn">Batal</button>
      </div>
    </form>

  </div>

</main>

</body>
</html>
