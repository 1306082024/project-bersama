<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Teknisi - Gintara</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
:root {
  --primary:#0b6fd6;
  --primary-light:#e0f2fe;
  --bg-body:#f4f7fa;
  --bg-card:#ffffff;
  --text-main:#1f2937;
  --text-muted:#6b7280;
  --border:#e5e7eb;
  --success:#10b981;
  --warning:#f59e0b;
  --danger:#ef4444;
  --sidebar-width:260px;
  --shadow:0 4px 6px -1px rgba(0,0,0,.05), 0 2px 4px -1px rgba(0,0,0,.03);
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
  display: flex;
  flex-direction: column;
}
.sidebar-logo {
  padding: 24px;
  font-size: 20px;
  font-weight: 700;
  color: var(--primary);
  border-bottom: 1px solid var(--border);
}
.nav{padding:20px 16px; flex: 1; overflow-y: auto;}
.nav-label{
  font-size:11px;
  text-transform:uppercase;
  color:var(--text-muted);
  margin:20px 0 8px 12px;
  font-weight:600;
  letter-spacing: 0.5px;
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
  transition: all 0.2s;
}
.nav-item:hover{background:var(--primary-light); color:var(--primary)}
.nav-item.active{
  background:var(--primary);
  color:#fff;
  box-shadow:0 4px 12px rgba(11,111,214,.2);
}
.nav-icon{margin-right:12px; width: 20px; text-align: center;}

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
  background:var(--primary-light);
  color:var(--primary);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:700;
}

/* CARDS */
.grid-summary{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:20px;
  margin-bottom:30px;
}
.card{
  background:var(--bg-card);
  border-radius:12px;
  padding:20px;
  border:1px solid var(--border);
  box-shadow:var(--shadow);
  position: relative;
}
.card-icon {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 1.5rem;
  opacity: 0.2;
}

/* LIST TUGAS */
.task-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    padding: 16px;
    border-radius: 12px;
    margin-bottom: 12px;
    border: 1px solid var(--border);
}
.task-info h4 { margin: 0 0 4px 0; font-size: 16px; }
.task-info p { margin: 0; font-size: 13px; color: var(--text-muted); }
.task-action { display: flex; gap: 8px; }

.btn {
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
  border: 1px solid var(--border);
  transition: 0.2s;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.btn-primary { background: var(--primary); color: white; border: none; }
.btn-outline { background: white; color: var(--text-main); }
.btn-outline:hover { background: #f9fafb; }

.badge{
  padding:4px 10px;
  border-radius:20px;
  font-size:11px;
  font-weight:700;
  text-transform: uppercase;
}
.badge-warning{background:#fef3c7;color:#b45309}
.badge-green{background:#dcfce7;color:#15803d}

@media(max-width:768px){
  .sidebar{display:none}
  .main{margin-left:0;padding:20px}
}
</style>
</head>

<body>

<aside class="sidebar">
  <nav class="nav">
    <a href="/teknisi" class="nav-item active">
      <span class="nav-icon"><i class="fa-solid fa-house"></i></span> Dashboard
    </a>

    <div class="nav-label">Manajemen Tugas</div>
    <a href="/teknisi/tugas" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span> Tugas Instalasi
    </a>
    <a href="/teknisi/gangguan" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-circle-exclamation"></i></span> Perbaikan Gangguan
    </a>
    <a href="/teknisi/riwayat" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-clock-rotate-left"></i></span> Riwayat Kerja
    </a>

    <div class="nav-label">Akun</div>
    <a href="/teknisi/profil" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-user-gear"></i></span> Profil & Keamanan
    </a>
    <a href="/logout" class="nav-item" style="color: var(--danger)" 
    onclick="return confirm('Apakah Anda yakin ingin keluar?')">
    <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> Logout
  </a>
  </nav>
</aside>

<main class="main">

<div class="header">
  <div>
    <h1 style="margin:0">Halo, Teknisi!</h1>
    <p style="margin:4px 0 0;color:var(--text-muted);font-size:14px">
      Cek jadwal instalasi dan gangguan hari ini.
    </p>
  </div>
  <div style="display:flex;gap:15px;align-items:center">
    <div style="text-align:right">
      <strong style="display:block">Budi Santoso</strong>
      <span class="badge badge-green">Online</span>
    </div>
    <div class="avatar">BS</div>
  </div>
</div>

<div class="grid-summary">
  <div class="card">
    <div class="card-icon" style="color: var(--primary)"><i class="fa-solid fa-list-check"></i></div>
    <div style="color:var(--text-muted);font-size:13px;font-weight:600">TOTAL TUGAS</div>
    <h2 id="total" style="margin:8px 0 0">0</h2>
  </div>

  <div class="card">
    <div class="card-icon" style="color: var(--warning)"><i class="fa-solid fa-truck-fast"></i></div>
    <div style="color:var(--text-muted);font-size:13px;font-weight:600">PENDING</div>
    <h2 id="menunggu" style="margin:8px 0 0;color:var(--warning)">0</h2>
  </div>

  <div class="card">
    <div class="card-icon" style="color: var(--success)"><i class="fa-solid fa-circle-check"></i></div>
    <div style="color:var(--text-muted);font-size:13px;font-weight:600">SELESAI</div>
    <h2 id="selesai" style="margin:8px 0 0;color:var(--success)">0</h2>
  </div>
</div>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
    <h3 style="margin:0">Tugas Hari Ini</h3>
    <a href="/teknisi/tugas" style="font-size: 13px; color: var(--primary); text-decoration: none; font-weight: 600;">Lihat Semua</a>
</div>

<div id="listTugas">
    <div style="padding: 20px; text-align: center; color: var(--text-muted);">Memuat data...</div>
</div>

</main>

<script>
// Sesuaikan dengan URL backend Laravel Anda
const API_BASE = 'http://localhost:8000/api'; 

// Fungsi untuk mengambil data tugas dari database
async function loadTugas() {
    try {
        const response = await fetch(`${API_BASE}/teknisi/tugas`);
        const data = await response.json();

        // 1. Update Stat Card (Tetap menghitung semua status untuk summary)
        document.getElementById('total').innerText = data.length;
        document.getElementById('menunggu').innerText = 
            data.filter(d => d.status === 'Menunggu Instalasi').length;
        document.getElementById('selesai').innerText = 
            data.filter(d => d.status === 'Terpasang').length;

        const wrap = document.getElementById('listTugas');
        wrap.innerHTML = '';

        // 2. FILTER: Hanya ambil yang statusnya 'Menunggu Instalasi'
        const tugasPending = data.filter(t => t.status === 'Menunggu Instalasi');

        if (tugasPending.length === 0) {
            wrap.innerHTML = '<div class="card" style="text-align:center; color:var(--text-muted)">Tidak ada tugas instalasi baru untuk hari ini.</div>';
            return;
        }

        // 3. Tampilkan hanya tugas yang sudah difilter
        tugasPending.forEach(t => {
            wrap.innerHTML += `
            <div class="task-card">
                <div class="task-info">
                    <span class="badge badge-warning" style="margin-bottom:8px">
                        ${t.status}
                    </span>
                    <h4>${t.nama}</h4>
                    <p><i class="fa-solid fa-location-dot"></i> ${t.full_alamat || t.alamat_jalan || '-'}</p>
                    <p><i class="fa-solid fa-phone"></i> ${t.kontak}</p>
                    <p><i class="fa-solid fa-box"></i> ${t.paket ? t.paket.nama : 'Tanpa Paket'}</p>
                </div>
                
                <div class="task-action">
                    <a href="https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(t.lokasi || t.full_alamat || t.nama)}" 
                       target="_blank" class="btn btn-outline">
                        <i class="fa-solid fa-map-location-dot"></i> Maps
                    </a>
                </div>
            </div>`;
        });
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('listTugas').innerHTML = '<div class="card" style="color:red">Koneksi ke database gagal.</div>';
    }
}

// Fungsi untuk update status ke 'Terpasang' di database
async function markAsDone(id) {
    if (!confirm('Apakah pekerjaan instalasi ini sudah selesai?')) return;

    try {
        const response = await fetch(`${API_BASE}/teknisi/selesai/${id}`, {
            method: 'POST', // Anda bisa menggunakan POST atau PUT sesuai route
            headers: { 'Content-Type': 'application/json' }
        });
        const resData = await response.json();

        if (resData.ok) {
            alert('Status diperbarui menjadi Terpasang!');
            loadTugas(); // Refresh data
        }
    } catch (error) {
        alert('Gagal memperbarui status.');
    }
}

// Jalankan saat halaman dibuka
loadTugas();
</script>

</body>
</html>