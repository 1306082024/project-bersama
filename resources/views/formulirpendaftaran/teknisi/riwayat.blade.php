<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Kerja - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root { --primary:#0b6fd6; --bg-body:#f4f7fa; --text-muted:#6b7280; --sidebar-width:260px; }
        body { margin: 0; font-family: 'Inter', sans-serif; background: var(--bg-body); display: flex; }
        .sidebar { width: var(--sidebar-width); background: #fff; border-right: 1px solid #e5e7eb; position: fixed; height: 100%; top: 0; left: 0; }
        .nav { padding: 20px 16px; display: flex; flex-direction: column; gap: 5px; }
        .nav-item { padding: 12px; color: var(--text-muted); text-decoration: none; display: flex; align-items: center; border-radius: 8px; font-size: 14px; }
        .nav-item.active { background: var(--primary); color: #fff; }
        .nav-icon { width: 25px; text-align: center; margin-right: 10px; }
        .main { margin-left: var(--sidebar-width); flex: 1; padding: 30px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,.05); }
        th { background: #f9fafb; text-align: left; padding: 15px; font-size: 13px; color: var(--text-muted); }
        td { padding: 15px; border-bottom: 1px solid #e5e7eb; font-size: 14px; }
        .img-thumb { width: 50px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #ddd; cursor: pointer; }
    </style>
</head>
<body>

<aside class="sidebar">
  <nav class="nav">
    <a href="/teknisi" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-house"></i></span> Dashboard
    </a>

    <div class="nav-label">Manajemen Tugas</div>
    <a href="/teknisi/tugas" class="nav-item active">
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
    <a href="/logout" class="nav-item" style="color: var(--danger)">
      <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> Logout
    </a>
  </nav>
</aside>

<main class="main">
    <h1>Riwayat Kerja</h1>
    <table>
        <thead>
            <tr><th>Tanggal</th><th>Pelanggan</th><th>Paket</th><th>Foto</th><th>Status</th></tr>
        </thead>
        <tbody id="riwayatTable">
            <tr><td colspan="5" style="text-align:center; padding:20px">Memuat data...</td></tr>
        </tbody>
    </table>
</main>

<div id="modalImg" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;" onclick="this.style.display='none'">
    <img id="imgFull" src="" style="max-width:90%; max-height:90%; border-radius:10px;">
</div>

<script>
    const API_URL = 'http://localhost:8000/api/teknisi/tugas';
    const BASE_URL = window.location.origin; // http://localhost:8000

    async function loadData() {
        try {
            const res = await fetch(API_URL);
            const data = await res.json();
            const finished = data.filter(d => d.status === 'Terpasang');
            const tb = document.getElementById('riwayatTable');
            
            tb.innerHTML = '';
            if(finished.length === 0) {
                tb.innerHTML = '<tr><td colspan="5" style="text-align:center; padding:20px">Belum ada data.</td></tr>';
                return;
            }

            finished.forEach(item => {
                // 1. Format Tanggal
                const tgl = item.updated_at ? new Date(item.updated_at).toLocaleDateString('id-ID') : '-';
                
                // 2. Format Foto (encodeURI PENTING untuk mengatasi spasi di DB Anda)
                let imgHtml = '<span style="color:#ccc; font-size:11px">No Foto</span>';
                
                if (item.foto_bukti) {
                    // encodeURI mengubah spasi menjadi %20 agar browser bisa membacanya
                    const path = `${BASE_URL}/storage/instalasi/${encodeURI(item.foto_bukti)}`;
                    imgHtml = `<img src="${path}" class="img-thumb" onclick="openFoto('${path}')" onerror="this.onerror=null;this.src='https://placehold.co/50x50?text=Error'">`;
                }

                tb.innerHTML += `
                    <tr>
                        <td>${tgl}</td>
                        <td>
                            <strong>${item.nama}</strong><br>
                            <small style="color:#888">${item.alamat_jalan || '-'}</small>
                        </td>
                        <td>${item.nama_paket || '-'}</td>
                        <td>${imgHtml}</td>
                        <td><span style="background:#dcfce7; color:#15803d; padding:4px 10px; border-radius:20px; font-size:12px; font-weight:bold">Selesai</span></td>
                    </tr>
                `;
            });
        } catch (error) {
            document.getElementById('riwayatTable').innerHTML = `<tr><td colspan="5" style="color:red; text-align:center">Error: ${error.message}</td></tr>`;
        }
    }

    function openFoto(url) {
        document.getElementById('imgFull').src = url;
        document.getElementById('modalImg').style.display = 'flex';
    }

    loadData();
</script>
</body>
</html>