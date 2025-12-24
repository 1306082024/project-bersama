<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Instalasi - Admin Gintara</title>
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
  --sidebar-width:260px;
  --shadow:0 4px 6px -1px rgba(0,0,0,.05), 0 2px 4px -1px rgba(0,0,0,.03)
}

* { box-sizing: border-box; }
body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background: var(--bg-body);
  display: flex;
  min-height: 100vh;
  color: var(--text-main);
  overflow-x: hidden;
}

/* ================= SIDEBAR (SAMA PERSIS DASHBOARD) ================= */
.sidebar {
  width: var(--sidebar-width);
  background: #fff;
  border-right: 1px solid var(--border);
  position: fixed;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 1000;
}

.nav {
  padding: 20px 16px;
}

.nav-label {
  font-size: 11px;
  text-transform: uppercase;
  color: var(--text-muted);
  letter-spacing: 0.5px;
  margin-bottom: 10px;
  margin-left: 12px;
  font-weight: 600;
  margin-top: 20px;
}

.nav-label:first-of-type { margin-top: 0; }

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
  font-size: 16px;
}

/* ================= MAIN AREA (SAMA PERSIS DASHBOARD) ================= */
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

/* CARD & TABLE */
.card {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  border: 1px solid var(--border);
  box-shadow: var(--shadow);
}

table { width: 100%; border-collapse: collapse; }
th, td { padding: 14px; border-bottom: 1px solid var(--border); font-size: 14px; text-align: left; }
th { background: #f9fafb; color: var(--text-muted); font-weight: 600; }

/* BADGE & MODAL */
.badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
.badge-online { background: #dcfce7; color: #15803d; }
.badge-offline { background: #f3f4f6; color: #6b7280; }
.badge-role { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }

.btn { padding: 8px 16px; border-radius: 8px; border: 1px solid var(--border); cursor: pointer; font-size: 13px; display: inline-flex; align-items: center; gap: 8px; transition: 0.2s; background: #fff; }
.btn-primary { background: var(--primary); color: #fff; border: none; }
.btn-outline-danger { color: var(--danger); border-color: var(--danger); }

.modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); align-items: center; justify-content: center; z-index: 2000; }
.modal-content { background: #fff; padding: 24px; border-radius: 12px; width: 450px; }
.form-group { margin-bottom: 16px; }
.form-group label { display: block; margin-bottom: 6px; font-size: 13px; font-weight: 600; }
.form-control { width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 8px; outline: none; font-family: inherit; }

@media (max-width: 768px) {
  .sidebar { display: none; }
  .main { margin-left: 0; padding: 20px; }
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
      <a href="pelanggan" class="nav-item">
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
          <a href="laporan-instalasi" class="nav-item active">
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
    <header style="margin-bottom:30px">
        <h1>Laporan Hasil Instalasi</h1>
        <p style="color:var(--text-muted)">Audit hasil kerja teknisi dan bukti foto lapangan.</p>
    </header>

    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center">
            <h3>Riwayat Pemasangan</h3>
            <button onclick="window.print()" class="btn" style="padding:8px 15px; cursor:pointer">
                <i class="fa-solid fa-print"></i> Cetak Laporan
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Teknisi</th>
                    <th>Paket</th>
                    <th>Bukti Foto</th>
                </tr>
            </thead>
            <tbody id="tableLaporan">
                </tbody>
        </table>
    </div>
</main>

<div id="modalImg" class="modal" onclick="this.style.display='none'">
    <img id="imgFull" src="" style="max-width:90%; max-height:80%; border-radius:12px;">
</div>

<script>
    const API = 'http://localhost:8000/api/admin/tamu';

    fetch(API)
    .then(r => r.json())
    .then(data => {
        const table = document.getElementById('tableLaporan');
        // Hanya tampilkan yang statusnya "Terpasang"
        const terpasang = data.filter(t => t.status === 'Terpasang');

        table.innerHTML = terpasang.map(t => `
            <tr>
                <td>${new Date(t.created_at).toLocaleDateString('id-ID')}</td>
                <td>
                    <strong>${t.nama}</strong><br>
                    <small style="color:gray">${t.full_alamat || '-'}</small>
                </td>
                <td>
                    <span style="color:var(--primary); font-weight:600">
                        <i class="fa-solid fa-user-gear"></i> ${t.teknisi_nama || 'Teknisi Gintara'}
                    </span>
                </td>
                <td>${t.paket?.nama || '-'}</td>
                <td>
                    ${t.foto_instalasi 
                        ? `<img src="/storage/instalasi/${t.foto_instalasi}" class="img-preview" onclick="showImg('/storage/instalasi/${t.foto_instalasi}')">` 
                        : '<span style="color:#ccc">Tidak ada foto</span>'}
                </td>
            </tr>
        `).join('');
    });

    function showImg(url) {
        document.getElementById('imgFull').src = url;
        document.getElementById('modalImg').style.display = 'flex';
    }
</script>
</body>
</html>