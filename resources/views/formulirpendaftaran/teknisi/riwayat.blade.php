<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kerja - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary:#0b6fd6; --bg-body:#f4f7fa; --bg-card:#ffffff;
            --text-main:#1f2937; --text-muted:#6b7280; --border:#e5e7eb; --success:#10b981;
            --sidebar-width:260px; --shadow:0 4px 6px -1px rgba(0,0,0,.05);
        }
        *{box-sizing:border-box}
        body{margin:0; font-family:'Inter',sans-serif; background:var(--bg-body); display:flex; min-height:100vh;}
        
        .sidebar{width:var(--sidebar-width); background:var(--bg-card); border-right:1px solid var(--border); position:fixed; height:100%; top:0; left:0;}
        .nav{padding:20px 16px;}
        .nav-label{font-size:11px; text-transform:uppercase; color:var(--text-muted); margin:20px 0 8px 12px; font-weight:600;}
        .nav-item{display:flex; align-items:center; padding:12px; color:var(--text-muted); text-decoration:none; border-radius:8px; margin-bottom:4px; font-size:14px;}
        .nav-item:hover{background:#e0f2fe; color:var(--primary)}
        .nav-item.active{background:var(--primary); color:#fff;}
        .nav-icon{margin-right:12px; width: 20px; text-align: center;}

        .main{margin-left:var(--sidebar-width); flex:1; padding:30px;}
        .card-table { background: white; border-radius: 12px; border: 1px solid var(--border); overflow: hidden; box-shadow: var(--shadow); }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f9fafb; text-align: left; padding: 15px; font-size: 13px; color: var(--text-muted); border-bottom: 1px solid var(--border); }
        td { padding: 15px; border-bottom: 1px solid var(--border); font-size: 14px; }
        .status-pill { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; background: #dcfce7; color: #15803d; }
    </style>
</head>
<body>

<aside class="sidebar">
  <nav class="nav">
    <a href="/teknisi" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-house"></i></span> Dashboard
    </a>

    <div class="nav-label">Manajemen Tugas</div>
    <a href="/teknisi/tugas" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span> Tugas Instalasi
    </a>
    <a href="/teknisi/gangguan" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-circle-exclamation"></i></span> Perbaikan Gangguan
    </a>
    <a href="/teknisi/riwayat" class="nav-item active">
      <span class="nav-icon"><i class="fa-solid fa-clock-rotate-left"></i></span> Riwayat Kerja
    </a>

    <div class="nav-label">Logistik & Alat</div>
    <a href="/teknisi/inventaris" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-box-archive"></i></span> Stok Material (Kabel/ONT)
    </a>
    <a href="/teknisi/peralatan" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-toolbox"></i></span> Alat Kerja (Splicer/OPM)
    </a>

    <div class="nav-label">Akun</div>
    <a href="/teknisi/profil" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-user-gear"></i></span> Profil & Keamanan
    </a>
    <a href="/logout" class="nav-item" style="color: var(--danger)">
      <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> Logout
    </a>
  </nav>
</aside>

<main class="main">
    <div style="margin-bottom: 30px;">
        <h1 style="margin:0">Riwayat Kerja</h1>
        <p style="color:var(--text-muted)">Daftar seluruh pekerjaan yang telah diselesaikan.</p>
    </div>

    <div class="card-table">
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="riwayatTable">
                <tr><td colspan="4" style="text-align:center; padding:20px;">Memuat riwayat...</td></tr>
            </tbody>
        </table>
    </div>
</main>

<script>
    const API_BASE = 'http://localhost:8000/api';

    async function loadRiwayat() {
        try {
            const response = await fetch(`${API_BASE}/teknisi/tugas`);
            const data = await response.json();
            
            // Filter: Hanya yang statusnya 'Terpasang'
            const selesai = data.filter(d => d.status === 'Terpasang');

            const tb = document.getElementById('riwayatTable');
            tb.innerHTML = '';

            if (selesai.length === 0) {
                tb.innerHTML = '<tr><td colspan="4" style="text-align:center">Belum ada riwayat pekerjaan.</td></tr>';
                return;
            }

            selesai.forEach(r => {
                tb.innerHTML += `
                <tr>
                    <td><strong>${r.nama}</strong></td>
                    <td>${r.full_alamat || r.alamat_jalan}</td>
                    <td>${r.paket ? r.paket.nama : '-'}</td>
                    <td><span class="status-pill">Selesai</span></td>
                </tr>`;
            });
        } catch (e) {
            console.error(e);
        }
    }

    loadRiwayat();
</script>
</body>
</html>