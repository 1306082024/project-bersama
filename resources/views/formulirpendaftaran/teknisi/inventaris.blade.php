<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Material - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary:#0b6fd6; --bg-body:#f4f7fa; --bg-card:#ffffff;
            --text-main:#1f2937; --text-muted:#6b7280; --border:#e5e7eb;
            --danger:#ef4444; --success:#10b981; --sidebar-width:260px;
        }
        *{box-sizing:border-box}
        body{margin:0; font-family:'Inter',sans-serif; background:var(--bg-body); display:flex; min-height:100vh;}
        
        .sidebar{width:var(--sidebar-width); background:var(--bg-card); border-right:1px solid var(--border); position:fixed; height:100%; top:0; left:0;}
        .nav{padding:20px 16px;}
        .nav-label{font-size:11px; text-transform:uppercase; color:var(--text-muted); margin:20px 0 8px 12px; font-weight:600;}
        .nav-item{display:flex; align-items:center; padding:12px; color:var(--text-muted); text-decoration:none; border-radius:8px; margin-bottom:4px; font-size:14px; font-weight:500;}
        .nav-item:hover{background:#e0f2fe; color:var(--primary)}
        .nav-item.active{background:var(--primary); color:#fff;}
        .nav-icon{margin-right:12px; width: 20px; text-align: center;}

        .main{margin-left:var(--sidebar-width); flex:1; padding:30px;}
        
        .grid-material { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
        .card-item { background: white; border-radius: 12px; padding: 20px; border: 1px solid var(--border); display: flex; align-items: center; gap: 15px; box-shadow: 0 4px 6px -1px rgba(0,0,0,.05); }
        .item-icon { width: 50px; height: 50px; border-radius: 10px; background: #f0f7ff; display: flex; align-items: center; justify-content: center; font-size: 20px; color: var(--primary); }
        .item-info h4 { margin: 0; font-size: 15px; }
        .item-info p { margin: 5px 0 0; font-size: 13px; color: var(--text-muted); }
        .stock-tag { padding: 4px 8px; border-radius: 6px; font-size: 11px; font-weight: 700; margin-top: 10px; display: inline-block; }
        .tag-safe { background: #dcfce7; color: #15803d; }
        .tag-warning { background: #fef3c7; color: #b45309; }
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
    <a href="/teknisi/riwayat" class="nav-item">
      <span class="nav-icon"><i class="fa-solid fa-clock-rotate-left"></i></span> Riwayat Kerja
    </a>

    <div class="nav-label">Logistik & Alat</div>
    <a href="/teknisi/inventaris" class="nav-item active">
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
        <h1 style="margin:0">Stok Material</h1>
        <p style="color:var(--text-muted)">Barang habis pakai untuk pemasangan pelanggan.</p>
    </div>

    <div class="grid-material" id="materialList"></div>
</main>

<script>
    // DATA DUMMY
    const dummyMaterial = [
        { nama: "Kabel Dropcore 1 Core", stok: 1250, satuan: "Meter" },
        { nama: "Modem ONT Fiberhome", stok: 3, satuan: "Unit" },
        { nama: "Fast Connector UPC", stok: 85, satuan: "Pcs" },
        { nama: "S-Clamp / Hook", stok: 40, satuan: "Pcs" },
        { nama: "Kabel Patchcord 3M", stok: 12, satuan: "Unit" }
    ];

    function loadDummy() {
        const container = document.getElementById('materialList');
        container.innerHTML = '';

        dummyMaterial.forEach(item => {
            const isLow = item.stok <= 10;
            container.innerHTML += `
            <div class="card-item">
                <div class="item-icon"><i class="fa-solid fa-box-open"></i></div>
                <div class="item-info">
                    <h4>${item.nama}</h4>
                    <p>Sisa: ${item.stok} ${item.satuan}</p>
                    <span class="stock-tag ${isLow ? 'tag-warning' : 'tag-safe'}">
                        ${isLow ? 'Hampir Habis' : 'Stok Aman'}
                    </span>
                </div>
            </div>`;
        });
    }
    loadDummy();
</script>
</body>
</html>