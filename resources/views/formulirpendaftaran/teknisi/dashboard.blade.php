<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Teknisi - Admin Gintara</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
  --primary:#0b6fd6;
  --primary-dark:#074e9e;
  --bg-body:#f4f7fa;
  --bg-card:#ffffff;
  --text-main:#1f2937;
  --text-muted:#6b7280;
  --border:#e5e7eb;
  --success:#10b981;
  --warning:#f59e0b;
  --danger:#ef4444;
  --sidebar-width:260px;
  --shadow:0 4px 6px -1px rgba(0,0,0,.05),
           0 2px 4px -1px rgba(0,0,0,.03);
}

*{box-sizing:border-box}
body{
  margin:0;
  font-family:'Inter',sans-serif;
  background:var(--bg-body);
  color:var(--text-main);
  display:flex;
  min-height:100vh;
}

/* SIDEBAR */
.sidebar{
  width:var(--sidebar-width);
  background:var(--bg-card);
  border-right:1px solid var(--border);
  position:fixed;
  height:100%;
  top:0;left:0;
}
.nav{padding:20px 16px}
.nav-label{
  font-size:11px;
  text-transform:uppercase;
  color:var(--text-muted);
  margin:16px 0 8px 12px;
  font-weight:600;
}
.nav-item{
  display:flex;
  align-items:center;
  padding:12px;
  color:var(--text-muted);
  text-decoration:none;
  border-radius:8px;
  margin-bottom:4px;
  font-size:14px;
  font-weight:500;
}
.nav-item:hover{background:#f0f7ff;color:var(--primary)}
.nav-item.active{
  background:var(--primary);
  color:#fff;
  box-shadow:0 4px 12px rgba(11,111,214,.2);
}
.nav-icon{margin-right:12px}

/* MAIN */
.main{
  margin-left:var(--sidebar-width);
  flex:1;
  padding:30px;
}
.header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:30px;
}
.avatar{
  width:40px;height:40px;
  border-radius:50%;
  background:#e0e7ff;
  color:var(--primary);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:700;
}

/* CARD */
.card{
  background:var(--bg-card);
  border-radius:12px;
  padding:20px;
  border:1px solid var(--border);
  box-shadow:var(--shadow);
}
.card + .card{margin-top:16px}

.btn{
  padding:8px 12px;
  border-radius:8px;
  border:1px solid var(--border);
  background:#fff;
  cursor:pointer;
  font-size:13px;
}
.btn-success{
  background:var(--success);
  color:#fff;
  border:none;
}

.badge{
  padding:4px 10px;
  border-radius:20px;
  font-size:12px;
  font-weight:600;
  display:inline-block;
}
.badge-warning{background:#fef3c7;color:#b45309}
.badge-green{background:#dcfce7;color:#15803d}

/* SUMMARY */
.summary{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:20px;
  margin-bottom:30px;
}

@media(max-width:768px){
  .sidebar{display:none}
  .main{margin-left:0;padding:20px}
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <nav class="nav">

    <a href="/teknisi" class="nav-item active">
      <span class="nav-icon">📊</span> Dashboard
    </a>

    <div class="nav-label">Pekerjaan</div>

    <a href="/teknisi/tugas" class="nav-item">
      <span class="nav-icon">🛠️</span> Tugas Instalasi
    </a>

    <a href="/teknisi/riwayat" class="nav-item">
      <span class="nav-icon">📁</span> Riwayat Pekerjaan
    </a>

    <div class="nav-label">Akun</div>

    <a href="/teknisi/profil" class="nav-item">
      <span class="nav-icon">👤</span> Profil Saya
    </a>

    <a href="/logout" class="nav-item">
      <span class="nav-icon">🚪</span> Logout
    </a>

  </nav>
</aside>

<!-- MAIN -->
<main class="main">

<!-- HEADER -->
<div class="header">
  <div>
    <h1 style="margin:0">Dashboard Teknisi</h1>
    <p style="margin:4px 0 0;color:var(--text-muted);font-size:14px">
      Ringkasan tugas pemasangan internet
    </p>
  </div>
  <div style="display:flex;gap:12px;align-items:center">
    <div style="text-align:right">
      <strong>Teknisi</strong><br>
      <small style="color:var(--text-muted)">Installer</small>
    </div>
    <div class="avatar">T</div>
  </div>
</div>

<!-- SUMMARY -->
<div class="summary">
  <div class="card">
    <div style="color:var(--text-muted);font-size:13px">Total Tugas</div>
    <h2 id="total" style="margin:8px 0 0">0</h2>
  </div>

  <div class="card">
    <div style="color:var(--text-muted);font-size:13px">Menunggu Instalasi</div>
    <h2 id="menunggu" style="margin:8px 0 0;color:var(--warning)">0</h2>
  </div>

  <div class="card">
    <div style="color:var(--text-muted);font-size:13px">Sudah Terpasang</div>
    <h2 id="selesai" style="margin:8px 0 0;color:var(--success)">0</h2>
  </div>
</div>

<!-- LIST -->
<h3 style="margin-bottom:12px">Tugas Terbaru</h3>
<div id="listTugas"></div>

</main>

<script>
const API='http://localhost:8000/api/teknisi/tugas';

fetch(API)
.then(r=>r.json())
.then(data=>{
  document.getElementById('total').innerText=data.length;
  document.getElementById('menunggu').innerText=
    data.filter(d=>d.status==='Menunggu Instalasi').length;
  document.getElementById('selesai').innerText=
    data.filter(d=>d.status==='Terpasang').length;

  const wrap=document.getElementById('listTugas');
  wrap.innerHTML='';

  if(data.length===0){
    wrap.innerHTML='<div class="card">Tidak ada tugas</div>';
    return;
  }

  data.slice(0,5).forEach(t=>{
    wrap.innerHTML+=`
    <div class="card">
      <strong>${t.nama}</strong><br>
      📞 ${t.kontak}<br>
      📦 ${t.paket?.nama || '-'}<br><br>

      <span class="badge ${t.status==='Terpasang'?'badge-green':'badge-warning'}">
        ${t.status}
      </span>

      <div style="margin-top:12px">
        <a href="https://maps.google.com/?q=${t.lokasi}" target="_blank">
          📍 Buka Maps
        </a>
      </div>
    </div>`;
  });
});
</script>

</body>
</html>
