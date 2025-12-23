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
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Paket</th>
                <th>Bukti Foto</th> <th>Status</th>
            </tr>
        </thead>
        <tbody id="riwayatTable">
            <tr><td colspan="5" style="text-align:center; padding:20px;">Memuat riwayat...</td></tr>
        </tbody>
    </table>
</div>

<div id="modalImg" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; align-items:center; justify-content:center; padding:20px;" onclick="this.style.display='none'">
    <img id="imgFull" src="" style="max-width:100%; max-height:90%; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.5);">
</div>

<script>
    const API_BASE = 'http://localhost:8000/api';

    async function loadRiwayat() {
        const tb = document.getElementById('riwayatTable');
        try {
            const response = await fetch(`${API_BASE}/teknisi/tugas`);
            if (!response.ok) throw new Error('Gagal mengambil data');
            
            const data = await response.json();
            const selesai = data.filter(d => d.status === 'Terpasang');

            tb.innerHTML = '';

            if (selesai.length === 0) {
                tb.innerHTML = '<tr><td colspan="5" style="text-align:center">Belum ada riwayat pekerjaan.</td></tr>';
                return;
            }

            selesai.forEach(r => {
                // Format tanggal Indonesia
                const tgl = new Date(r.updated_at).toLocaleDateString('id-ID', {
                    day: '2-digit', month: 'short', year: 'numeric'
                });

                // Cek Foto
                const fotoUrl = r.foto_instalasi ? `/storage/instalasi/${r.foto_instalasi}` : null;
                const fotoHtml = fotoUrl 
                    ? `<img src="${fotoUrl}" onclick="openImg('${fotoUrl}')" style="width:40px; height:40px; border-radius:6px; object-fit:cover; cursor:pointer; border:1px solid #ddd;">`
                    : '<span style="color:#ccc; font-size:11px;">No Photo</span>';

                tb.innerHTML += `
                <tr>
                    <td><span style="font-size:12px; color:var(--text-muted)">${tgl}</span></td>
                    <td>
                        <strong>${r.nama}</strong><br>
                        <small style="color:var(--text-muted)">${r.full_alamat || r.alamat_jalan}</small>
                    </td>
                    <td><small>${r.paket ? r.paket.nama : '-'}</small></td>
                    <td>${fotoHtml}</td>
                    <td><span class="status-pill">Selesai</span></td>
                </tr>`;
            });
        } catch (e) {
            tb.innerHTML = `<tr><td colspan="5" style="text-align:center; color:red;">Terjadi kesalahan: ${e.message}</td></tr>`;
        }
    }

    function openImg(url) {
        document.getElementById('imgFull').src = url;
        document.getElementById('modalImg').style.display = 'flex';
    }

    loadRiwayat();
</script>
</body>
</html>