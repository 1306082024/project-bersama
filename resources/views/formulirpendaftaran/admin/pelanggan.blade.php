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
  --shadow: 0 4px 6px -1px rgba(0,0,0,.05),
            0 2px 4px -1px rgba(0,0,0,.03);
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background-color: var(--bg-body);
  color: var(--text-main);
  display: flex;
  min-height: 100vh;
}

/* ================= SIDEBAR ================= */
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

.nav {
  padding: 20px 16px;
  flex: 1;
}

.nav-label {
  font-size: 11px;
  text-transform: uppercase;
  color: var(--text-muted);
  letter-spacing: 0.5px;
  margin: 20px 0 10px 12px;
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
  transition: .2s;
}

.nav-item:hover {
  background: #f0f7ff;
  color: var(--primary);
}

.nav-item.active {
  background: var(--primary);
  color: white;
  box-shadow: 0 4px 12px rgba(11,111,214,.2);
}

.nav-icon {
  margin-right: 12px;
  width: 20px;
  text-align: center;
}

/* ================= MAIN ================= */
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

/* ================= CARD ================= */
.card {
  background: var(--bg-card);
  border-radius: 12px;
  padding: 20px;
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
}

/* ================= FORM CONTROL ================= */
input,
select {
  font-family: Inter;
}

input[type="text"],
select {
  padding: 8px;
  border-radius: 8px;
  border: 1px solid var(--border);
  font-size: 13px;
  background: white;
}

/* ================= BUTTON ================= */
.btn {
  padding: 6px 12px;
  border-radius: 8px;
  border: 1px solid var(--border);
  background: white;
  cursor: pointer;
  font-size: 12px;
  transition: .2s;
}

.btn:hover {
  background: #f3f4f6;
}

.btn-primary {
  background: var(--primary);
  color: white;
  border: none;
}

.btn-primary:hover {
  background: var(--primary-dark);
}

/* ================= TABLE ================= */
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
  padding: 14px 16px;
  border-bottom: 1px solid var(--border);
  vertical-align: top;
  color: var(--text-main);
}

/* ================= BADGE ================= */
.badge {
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 600;
  display: inline-block;
}

.badge-green {
  background: #dcfce7;
  color: #15803d;
}

.badge-yellow {
  background: #fef3c7;
  color: #b45309;
}

.badge-red {
  background: #fee2e2;
  color: #dc2626;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 900px) {
  .main {
    padding: 20px;
  }
}

@media (max-width: 768px) {
  .sidebar {
    display: none;
  }
  .main {
    margin-left: 0;
    padding: 20px;
  }
  .header h1 {
    font-size: 20px;
  }
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
      <a href="pelanggan" class="nav-item active">
        <span class="nav-icon">👥</span> Data Pelanggan
      </a>
      <a href="wilayah" class="nav-item">
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
