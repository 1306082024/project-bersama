<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbaikan Gangguan - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary:#0b6fd6; --primary-light:#e0f2fe; --bg-body:#f4f7fa; --bg-card:#ffffff;
            --text-main:#1f2937; --text-muted:#6b7280; --border:#e5e7eb; --success:#10b981;
            --warning:#f59e0b; --danger:#ef4444; --sidebar-width:260px;
            --shadow:0 4px 6px -1px rgba(0,0,0,.05), 0 2px 4px -1px rgba(0,0,0,.03);
        }
        *{box-sizing:border-box}
        body{margin:0; font-family:'Inter',sans-serif; background:var(--bg-body); color:var(--text-main); display:flex; min-height:100vh;}
        
        .sidebar{width:var(--sidebar-width); background:var(--bg-card); border-right:1px solid var(--border); position:fixed; height:100%; top:0; left:0; display: flex; flex-direction: column;}
        .nav{padding:20px 16px; flex: 1;}
        .nav-label{font-size:11px; text-transform:uppercase; color:var(--text-muted); margin:20px 0 8px 12px; font-weight:600;}
        .nav-item{display:flex; align-items:center; padding:12px; color:var(--text-muted); text-decoration:none; border-radius:8px; margin-bottom:4px; font-size:14px; font-weight:500;}
        .nav-item:hover{background:var(--primary-light); color:var(--primary)}
        .nav-item.active{background:var(--primary); color:#fff;}
        .nav-icon{margin-right:12px; width: 20px; text-align: center;}

        .main{margin-left:var(--sidebar-width); flex:1; padding:30px;}
        .task-card { display: flex; justify-content: space-between; align-items: center; background: white; padding: 16px; border-radius: 12px; margin-bottom: 12px; border: 1px solid var(--border); border-left: 4px solid var(--danger); }
        .btn { padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; border: 1px solid var(--border); text-decoration: none; }
        .btn-primary { background: var(--primary); color: white; border: none; }
        .btn-outline { background: white; color: var(--text-main); }
        .badge{ padding:4px 10px; border-radius:20px; font-size:11px; font-weight:700; text-transform: uppercase; }
        .badge-danger{background:#fee2e2; color:#b91c1c}
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
    <a href="/teknisi/gangguan" class="nav-item active">
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
    <div style="margin-bottom: 30px;">
        <h1 style="margin:0">Perbaikan Gangguan</h1>
        <p style="color:var(--text-muted)">Tiket gangguan aktif yang perlu segera ditangani.</p>
    </div>

    <div id="listGangguan">
        </div>
</main>

<script>
    // DATA DUMMY
    const dummyData = [
        {
            id: 1,
            nama: "Budi Santoso",
            status: "Gangguan",
            full_alamat: "Perumahan Trusmiland Tahap 5. No. N11, kec. Battembat. Kab. Cirebon",
            kontak: "0812-3456-7890",
            lokasi: "-6.3273, 108.3241"
        },
        {
            id: 2,
            nama: "Siti Aminah",
            status: "Perbaikan",
            full_alamat: "Perumahan Trusmiland Tahap 1. No. A2, kec. Gunung Jati. Kab. Cirebon",
            kontak: "0877-8899-1122",
            lokasi: "-6.3475, 108.3012"
        },
        {
            id: 3,
            nama: "Jibranskuy",
            status: "Gangguan",
            full_alamat: "Perumahan Trusmiland Tahap 4. No. F4, kec. Battembat. Kab. Cirebon",
            kontak: "0821-4433-5566",
            lokasi: "-6.3123, 108.3300"
        }
    ];

    function loadGangguan() {
        const wrap = document.getElementById('listGangguan');
        wrap.innerHTML = '';

        // Filter data (sama seperti logic API sebelumnya)
        const list = dummyData.filter(d => d.status === 'Gangguan' || d.status === 'Perbaikan');

        if (list.length === 0) {
            wrap.innerHTML = '<div class="card" style="text-align:center; color:var(--text-muted); padding: 20px; background: white; border-radius: 12px; border: 1px solid var(--border);">Saat ini tidak ada laporan gangguan.</div>';
            return;
        }

        list.forEach(g => {
            wrap.innerHTML += `
            <div class="task-card">
                <div class="task-info">
                    <span class="badge badge-danger">High Priority</span>
                    <h4 style="margin: 10px 0 5px">${g.nama}</h4>
                    <p style="font-size: 13px; color: var(--text-muted);"><i class="fa-solid fa-location-dot"></i> ${g.full_alamat}</p>
                    <p style="font-size: 13px; color: var(--text-muted);"><i class="fa-solid fa-phone"></i> ${g.kontak}</p>
                </div>
                <div class="task-action" style="display:flex; gap:10px;">
                    <a href="https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(g.lokasi)}" target="_blank" class="btn btn-outline">
                        <i class="fa-solid fa-map"></i> Maps
                    </a>
                    <button class="btn btn-primary" onclick="updateStatus(${g.id})">
                        <i class="fa-solid fa-check"></i> Selesaikan
                    </button>
                </div>
            </div>`;
        });
    }

    // Simulasi fungsi update status
    function updateStatus(id) {
        if(confirm("Apakah gangguan ini sudah selesai diperbaiki?")) {
            alert("Berhasil! Status gangguan ID #" + id + " telah diselesaikan.");
            const index = dummyData.findIndex(item => item.id === id);
            if (index !== -1) {
                dummyData.splice(index, 1);
                loadGangguan();
            }
        }
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = loadGangguan;
</script>
</body>
</html>