<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Pelanggan - Admin Gintara</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
:root{
  --primary:#0b6fd6;
  --bg-body:#f4f7fa;
  --bg-card:#fff;
  --text-main:#1f2937;
  --text-muted:#6b7280;
  --border:#e5e7eb;
  --success:#10b981;
  --danger:#ef4444;
  --info:#3b82f6;
  --sidebar-width:260px;
  --shadow:0 4px 6px -1px rgba(0,0,0,.05),0 2px 4px -1px rgba(0,0,0,.03)
}

*{box-sizing:border-box}
body{
  margin:0;
  font-family:Inter;
  background:var(--bg-body);
  display:flex;
  min-height:100vh;
  color:var(--text-main)
}

/* ===== SIDEBAR (SAMA DENGAN DASHBOARD) ===== */
.sidebar{
  width:var(--sidebar-width);
  background:#fff;
  border-right:1px solid var(--border);
  position:fixed;
  height:100%;
  top:0;left:0
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
/* ===== MAIN ===== */
.main{
  margin-left:var(--sidebar-width);
  flex:1;
  padding:30px;
  max-width:100%
}
.header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:30px
}
.avatar{
  width:40px;
  height:40px;
  border-radius:50%;
  background:#e0e7ff;
  color:var(--primary);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:700
}

/* ===== CARD & TABLE ===== */
.card{
  background:#fff;
  border-radius:12px;
  padding:20px;
  border:1px solid var(--border);
  box-shadow:var(--shadow)
}

table{width:100%;border-collapse:collapse}
th,td{
  padding:16px;
  border-bottom:1px solid var(--border);
  vertical-align:top;
  font-size:14px
}
th{
  background:#f9fafb;
  color:#6b7280
}

/* ===== BADGE ===== */
.badge{
  padding:6px 12px;
  border-radius:20px;
  font-size:12px;
  font-weight:600;
  display:inline-block
}
.baru{background:#fef3c7;color:#b45309}
.proses{background:#e0f2fe;color:#0369a1}
.disurvey{background:#dcfce7;color:#15803d}
.install{background:#d1fae5;color:#065f46}
.terpasang{background:#ede9fe;color:#5b21b6}
.batal{background:#fee2e2;color:#b91c1c}

/* ===== BUTTON ===== */
.btn{
  padding:6px 12px;
  border-radius:8px;
  border:1px solid var(--border);
  background:#fff;
  cursor:pointer;
  font-size:12px
}
.btn-primary{background:var(--primary);color:#fff;border:none}
.btn-info{background:var(--info);color:#fff;border:none}
.btn-success{background:var(--success);color:#fff;border:none}

.action{
  display:flex;
  gap:8px;
  flex-wrap:wrap
}
</style>
</head>

<body>

<aside class="sidebar">
    <nav class="nav">
      <a href="dashboardA" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-chart-line"></i></span> Dashboard
      </a>
      
      <div class="nav-label">Manajemen Pelanggan</div>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-file-signature"></i></span> Data Pendaftar
      </a>
      <a href="pelanggan" class="nav-item active">
        <span class="nav-icon"><i class="fa-solid fa-users"></i></span> Data Pelanggan
      </a>

      <div class="nav-label">Infrastruktur & Tim</div>
      <a href="wilayah" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-map-location-dot"></i></span> Kelola Wilayah
      </a>
      <a href="data-teknisi" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span> Data Teknisi
      </a>
      <a href="paket" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-box"></i></span> Paket Internet
      </a>
      <div class="nav-label">Laporan & Audit</div>
        <a href="laporan-instalasi" class="nav-item">
          <span class="nav-icon"><i class="fa-solid fa-clipboard-check"></i></span> Laporan Instalasi
        </a>
      <div class="nav-label" style="margin-top:20px">Settings</div>
      <a href="pengaturan" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-gear"></i></span> Pengaturan
      </a>
      <a href="#" class="nav-item" style="color: var(--danger)">
        <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> Logout
      </a>
    </nav>
</aside>

<main class="main">

<header class="header">
  <div>
    <h1>Pelanggan</h1>
    <p style="color:#6b7280;font-size:14px">Data pelanggan aktif dari pendaftar</p>
  </div>
  <div style="display:flex;gap:12px;align-items:center">
    <div style="text-align:right">
      <strong>Administrator</strong><br>
      <small style="color:#6b7280">Admin</small>
    </div>
    <div class="avatar">A</div>
  </div>
</header>

<div style="display:flex;gap:10px;margin-bottom:20px">
  <input id="searchInput" onkeyup="applyFilter()"
    placeholder="Cari nama / ID / alamat..."
    style="padding:8px;border-radius:8px;border:1px solid var(--border);width:300px">

  <select id="statusFilter" onchange="applyFilter()"
    style="padding:8px;border-radius:8px;border:1px solid var(--border)">
    <option value="">Semua Status</option>
    <option>Aktif</option>
    <option>Telat Bayar</option>
    <option>Non-aktif</option>
    <option>Batal</option>
  </select>
</div>

<div class="card">
<table>
<thead>
<tr>
  <th>ID</th>
  <th>Nama & Kontak</th>
  <th>Alamat</th>
  <th>Paket</th>
  <th>Jatuh Tempo</th>
  <th>Status</th>
  <th>Maps</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody id="pelangganTable"></tbody>
</table>
</div>

</main>

<script>
const API = 'http://localhost:8000/api/admin/pelanggan';
let dataPelanggan = [];

function badge(status){
  const map={
    'Aktif':'badge-green',
    'Telat Bayar':'badge-yellow',
    'Non-aktif':'badge-red',
    'Batal':'badge-red'
  };
  return `<span class="badge ${map[status]||'badge-green'}">${status}</span>`;
}

function renderTable(data){
  const tbody=document.getElementById('pelangganTable');
  tbody.innerHTML='';

  if(data.length===0){
    tbody.innerHTML=`<tr><td colspan="8" style="text-align:center;color:#6b7280">Data kosong</td></tr>`;
    return;
  }

  data.forEach(p=>{
    tbody.innerHTML+=`
    <tr>
      <td>#TRS-${String(p.id).padStart(3,'0')}</td>
      <td>
        <strong>${p.nama}</strong><br>
        📞 ${p.kontak}<br>
        ✉️ ${p.email||'-'}
      </td>
      <td>${p.alamat}</td>
      <td>${p.paket||'-'}</td>
      <td>${p.jatuh_tempo} setiap bulan</td>
      <td>${badge(p.status)}</td>
      <td>
        <a href="https://maps.google.com/?q=${p.lokasi}" target="_blank" class="btn">📍 Maps</a>
      </td>
      <td>
        <button class="btn">Detail</button>
      </td>
    </tr>`;
  });
}

function applyFilter(){
  const key=document.getElementById('searchInput').value.toLowerCase();
  const status=document.getElementById('statusFilter').value;

  const filtered=dataPelanggan.filter(p=>{
    const text=(p.nama+p.alamat+p.id).toLowerCase().includes(key);
    const st=!status||p.status===status;
    return text&&st;
  });

  renderTable(filtered);
}

fetch(API)
.then(r=>r.json())
.then(d=>{
  dataPelanggan=d;
  renderTable(d);
})
.catch(()=>{
  document.getElementById('pelangganTable').innerHTML=
  `<tr><td colspan="8" style="text-align:center;color:red">Gagal memuat data</td></tr>`;
});
</script>

</body>
</html>
