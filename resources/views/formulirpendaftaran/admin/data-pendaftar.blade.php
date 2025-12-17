<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pendaftaran - Admin Gintara</title>

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
.nav{padding:20px 16px}
.nav-item{
  display:flex;
  align-items:center;
  padding:12px;
  border-radius:8px;
  color:var(--text-muted);
  text-decoration:none;
  margin-bottom:4px;
  font-size:14px
}
.nav-item.active{
  background:var(--primary);
  color:#fff
}
.nav-icon{
  margin-right:12px;
  width:20px;
  text-align:center
}
.nav-label{
  font-size:11px;
  text-transform:uppercase;
  color:#9ca3af;
  margin:20px 0 8px 12px
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

<!-- SIDEBAR -->
<aside class="sidebar">
  <nav class="nav">
    <a href="tes" class="nav-item">
      <span class="nav-icon">📊</span> Dashboard
    </a>
    <a href="data-pendaftar" class="nav-item active">
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

    <div class="nav-label">Settings</div>
    <a href="pengaturan" class="nav-item">
      <span class="nav-icon">⚙️</span> Pengaturan
    </a>
    <a href="#" class="nav-item">
      <span class="nav-icon">🚪</span> Logout
    </a>
  </nav>
</aside>

<!-- MAIN -->
<main class="main">

<header class="header">
  <div>
    <h1>Data Pendaftar Baru</h1>
    <p style="color:#6b7280;font-size:14px">
      Kelola pendaftar dan update status dari panel ini.
    </p>
  </div>
  <div style="display:flex;align-items:center;gap:12px">
    <div style="text-align:right">
      <div style="font-weight:600">Administrator</div>
      <div style="font-size:12px;color:#6b7280">Admin</div>
    </div>
    <div class="avatar">A</div>
  </div>
</header>

<input id="search" onkeyup="applyFilter()" type="text"
 placeholder="Cari nama / NIK..."
 style="padding:8px;border-radius:8px;border:1px solid var(--border);width:260px;">
<select id="filterStatus" onchange="applyFilter()"
 style="padding:8px;border-radius:8px;border:1px solid var(--border);">
  <option value="">Semua Status</option>
  <option>Baru</option>
  <option>Proses</option>
  <option>Disurvey</option>
  <option>Survey OK</option>
  <option>Menunggu Instalasi</option>
  <option>Terpasang</option>
  <option>Batal</option>
</select>

<div class="card">
<table>
<thead>
<tr>
  <th>Tanggal Daftar</th>
  <th>Nama & Kontak</th>
  <th>Alamat Pemasangan</th>
  <th>Paket</th>
  <th>Maps</th>
  <th>Status</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody id="tableData"></tbody>
</table>
</div>

</main>

<script>
const API = 'http://localhost:8000/api/admin/tamu';

let allData = [];
let selectedDetail = null;

/* ===========================
   STATUS FLOW
=========================== */
const statusFlow = {
  'Baru': 'Proses',
  'Proses': 'Disurvey',
  'Disurvey': 'Survey OK',
  'Survey OK': 'Menunggu Instalasi',
  'Menunggu Instalasi': 'Terpasang'
};

/* ===========================
   BADGE
=========================== */
function badge(status){
  const map = {
    'Baru':'baru',
    'Proses':'proses',
    'Disurvey':'disurvey',
    'Survey OK':'disurvey',
    'Menunggu Instalasi':'install',
    'Terpasang':'terpasang',
    'Batal':'batal'
  };
  return `<span class="badge ${map[status]||'baru'}">${status}</span>`;
}

/* ===========================
   BUTTON AKSI
=========================== */
function aksi(t){
  const status = t.status || 'Baru';
  const next = statusFlow[status];

  let btn = '';

  if(next){
    let label = next;
    if(next === 'Disurvey') label = 'Jadwalkan Survey';
    if(next === 'Terpasang') label = 'Tandai Terpasang';

    btn = `
      <button class="btn btn-primary"
        onclick="updateStatus(${t.id}, '${next}')">
        ${label}
      </button>
    `;
  }

  return `
    ${btn}
    <button class="btn" onclick="openDetail(${t.id})">Detail</button>
  `;
}

/* ===========================
   RENDER TABLE
=========================== */
function renderTable(data){
  const tbody = document.getElementById('tableData');
  tbody.innerHTML='';

  if(data.length === 0){
    tbody.innerHTML = `
      <tr>
        <td colspan="7" style="text-align:center;color:#6b7280">
          Data tidak ditemukan
        </td>
      </tr>`;
    return;
  }

  data.forEach(t=>{
    tbody.innerHTML += `
    <tr>
      <td>${new Date(t.created_at).toLocaleDateString('id-ID')}</td>

      <td>
        <strong>${t.nama}</strong><br>
        📞 ${t.kontak}<br>
        ✉️ ${t.email || '-'}
      </td>

      <td>
        <strong>${t.alamat_jalan}</strong><br>
        ${t.no_rumah}<br>
        RT ${t.rt} / RW ${t.rw}<br>
        Desa ${t.desa}<br>
        Kec. ${t.kecamatan}<br>
        Kab. ${t.kabupaten}
      </td>

      <td>${t.paket?.nama || '-'}</td>

      <td>
        <a href="https://maps.google.com/?q=${t.lokasi}" target="_blank" class="btn">
          📍 Lihat Lokasi
        </a>
      </td>

      <td>${badge(t.status || 'Baru')}</td>

      <td>
        <div class="action">
          ${aksi(t)}
        </div>
      </td>
    </tr>`;
  });
}

/* ===========================
   UPDATE STATUS (FIXED)
=========================== */
function updateStatus(id, status){
  if(!confirm(`Ubah status menjadi "${status}" ?`)) return;

  fetch(`http://localhost:8000/api/admin/tamu/${id}/status`,{
    method:'PATCH',
    headers:{
      'Content-Type':'application/json',
      'Accept':'application/json'
    },
    body:JSON.stringify({status})
  })
  .then(r=>{
    if(!r.ok) throw new Error('Gagal update status');
    return r.json();
  })
  .then(()=>{
    loadData();
  })
  .catch(err=>{
    alert(err.message);
  });
}

/* ===========================
   DETAIL MODAL
=========================== */
function openDetail(id){
  selectedDetail = allData.find(x=>x.id===id);
  if(!selectedDetail) return;

  document.getElementById('detailBody').innerHTML = `
    <p><strong>Nama:</strong> ${selectedDetail.nama}</p>
    <p><strong>NIK:</strong> ${selectedDetail.nik || '-'}</p>
    <p><strong>Kontak:</strong> ${selectedDetail.kontak}</p>
    <p><strong>Email:</strong> ${selectedDetail.email || '-'}</p>
    <p><strong>Wilayah:</strong> ${selectedDetail.wilayah?.nama || '-'}</p>
    <p><strong>Paket:</strong> ${selectedDetail.paket?.nama || '-'}</p>
    <p><strong>Status:</strong> ${selectedDetail.status}</p>
    <p><strong>Alamat:</strong><br>${selectedDetail.full_alamat}</p>
  `;

  document.getElementById('detailModal').style.display='flex';
}

function closeDetail(){
  document.getElementById('detailModal').style.display='none';
}

/* ===========================
   FILTER
=========================== */
function applyFilter(){
  const keyword = document.getElementById('search').value.toLowerCase();
  const status = document.getElementById('filterStatus').value;

  const filtered = allData.filter(t=>{
    const text =
      t.nama.toLowerCase().includes(keyword) ||
      t.kontak.includes(keyword) ||
      (t.nik && t.nik.includes(keyword));

    const matchStatus = !status || t.status === status;
    return text && matchStatus;
  });

  renderTable(filtered);
}

/* ===========================
   LOAD DATA
=========================== */
function loadData(){
  fetch(API)
  .then(r=>r.json())
  .then(data=>{
    allData = data;
    renderTable(allData);
  });
}

loadData();
</script>

<div id="detailModal" style="
display:none;position:fixed;inset:0;
background:rgba(0,0,0,.4);
align-items:center;justify-content:center;z-index:999">
  <div style="
  background:#fff;padding:20px;
  border-radius:12px;width:420px">
    <h3>Detail Pendaftar</h3>
    <div id="detailBody" style="font-size:14px"></div>
    <div style="text-align:right;margin-top:16px">
      <button class="btn" onclick="closeDetail()">Tutup</button>
    </div>
  </div>
</div>

</body>
</html>
