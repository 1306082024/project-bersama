<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Instalasi - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary:#0b6fd6; --primary-light:#e0f2fe; --bg-body:#f4f7fa;
            --bg-card:#ffffff; --text-main:#1f2937; --text-muted:#6b7280;
            --border:#e5e7eb; --success:#10b981; --warning:#f59e0b; --danger:#ef4444;
            --sidebar-width:260px; --shadow:0 4px 6px -1px rgba(0,0,0,.05);
        }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Inter', sans-serif; background: var(--bg-body); display: flex; min-height: 100vh; }
        
        /* SIDEBAR */
        .sidebar { width: var(--sidebar-width); background: var(--bg-card); border-right: 1px solid var(--border); position: fixed; height: 100%; top: 0; left: 0; display: flex; flex-direction: column; z-index: 1000; }
        .nav { padding: 20px 16px; flex: 1; }
        .nav-label { font-size: 11px; text-transform: uppercase; color: var(--text-muted); margin: 20px 0 8px 12px; font-weight: 600; letter-spacing: 0.5px; }
        .nav-item { display: flex; align-items: center; padding: 12px; color: var(--text-muted); text-decoration: none; border-radius: 8px; margin-bottom: 4px; font-size: 14px; font-weight: 500; transition: 0.2s; }
        .nav-item:hover { background: var(--primary-light); color: var(--primary); }
        .nav-item.active { background: var(--primary); color: #fff; box-shadow: 0 4px 12px rgba(11,111,214,.2); }
        .nav-icon { margin-right: 12px; width: 20px; text-align: center; }

        /* CONTENT */
        .main { margin-left: var(--sidebar-width); flex: 1; padding: 30px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .card { background: var(--bg-card); border-radius: 12px; padding: 20px; border: 1px solid var(--border); box-shadow: var(--shadow); }
        
        .task-card { display: flex; justify-content: space-between; align-items: center; background: white; padding: 16px; border-radius: 12px; margin-bottom: 12px; border: 1px solid var(--border); transition: 0.3s; }
        .task-card:hover { border-color: var(--primary); }

        .btn { padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none; border: 1px solid var(--border); display: inline-flex; align-items: center; gap: 6px; transition: 0.2s; }
        .btn-primary { background: var(--primary); color: white; border: none; }
        .btn-outline { background: white; color: var(--text-main); }
        
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; }
        .badge-warning { background: #fef3c7; color: #b45309; }
        .badge-green { background: #dcfce7; color: #15803d; }

        /* MODAL */
        .modal { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center; z-index:2000; padding: 20px; }
        .modal-content { background: white; padding: 25px; border-radius: 12px; width: 100%; max-width: 400px; box-shadow: var(--shadow); }
        
        input[type="file"] { margin-top: 10px; font-size: 13px; }
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
    <div class="header">
        <h1>Daftar Tugas Instalasi</h1>
    </div>

    <div id="containerTugas">
        <div style="text-align:center; padding:50px; color:var(--text-muted)">Memuat data tugas...</div>
    </div>
</main>

<div id="modalFoto" class="modal">
    <div class="modal-content">
        <h3 style="margin-top:0">Upload Bukti Instalasi</h3>
        <p style="font-size:13px; color:var(--text-muted)">Ambil foto modem yang sudah terpasang atau hasil redaman OPM.</p>
        
        <form id="formUpload">
            <input type="hidden" id="selectedTaskId">
            <div style="margin: 20px 0;">
                <label style="font-size:12px; font-weight:700;">FOTO DOKUMENTASI:</label>
                <input type="file" id="fotoFile" accept="image/*" required>
            </div>
            
            <div style="display:flex; gap:10px;">
                <button type="button" class="btn" onclick="tutupModal()">Batal</button>
                <button type="submit" class="btn btn-primary" style="flex:1">Konfirmasi Selesai</button>
            </div>
        </form>
    </div>
</div>

<script>
    const API_URL = 'http://localhost:8000/api/admin/tamu';
    const container = document.getElementById('containerTugas');

    function loadTugas() {
        fetch(API_URL)
            .then(res => res.json())
            .then(data => {
                const filtered = data.filter(t => t.status === 'Menunggu Instalasi');
                render(filtered);
            })
            .catch(err => {
                container.innerHTML = '<div class="card" style="color:red; text-align:center">Gagal terhubung ke server</div>';
            });
    }

    function render(data) {
        container.innerHTML = '';
        if (data.length === 0) {
            container.innerHTML = '<div class="card" style="text-align:center; color:var(--text-muted)">Tidak ada tugas pendaftaran</div>';
            return;
        }

        data.forEach(t => {
            const isDone = t.status === 'Terpasang';
            container.innerHTML += `
                <div class="task-card">
                    <div>
                        <span class="badge ${isDone ? 'badge-green' : 'badge-warning'}">${t.status}</span>
                        <h4 style="margin:8px 0 4px">${t.nama}</h4>
                        <p style="font-size:13px; color:var(--text-muted)">
                            <i class="fa-solid fa-location-dot"></i> ${t.full_alamat || t.alamat_jalan || '-'}
                        </p>
                    </div>
                    <div class="task-action" style="display:flex; gap:8px;">
                        <a href="https://www.google.com/maps?q=${t.lokasi}" target="_blank" class="btn btn-outline">
                            <i class="fa-solid fa-map"></i> Lokasi
                        </a>
                        ${!isDone ? `
                            <button class="btn btn-primary" onclick="bukaModal(${t.id})">
                                <i class="fa-solid fa-camera"></i> Mulai Pasang
                            </button>
                        ` : ''}
                    </div>
                </div>
            `;
        });
    }

    /* LOGIC MODAL & UPLOAD */
    function bukaModal(id) {
        document.getElementById('selectedTaskId').value = id;
        document.getElementById('modalFoto').style.display = 'flex';
    }

    function tutupModal() {
        document.getElementById('modalFoto').style.display = 'none';
        document.getElementById('formUpload').reset();
    }

    document.getElementById('formUpload').onsubmit = async function(e) {
        e.preventDefault();
        
        const id = document.getElementById('selectedTaskId').value;
        const foto = document.getElementById('fotoFile').files[0];
        
        if(!foto) return alert("Pilih foto dulu!");

        const formData = new FormData();
        formData.append('status', 'Terpasang');
        formData.append('foto', foto);
        formData.append('_method', 'PATCH'); // Spoofing method PATCH untuk Laravel

        const btnSubmit = e.target.querySelector('button[type="submit"]');
        btnSubmit.innerText = "Mengirim...";
        btnSubmit.disabled = true;

        try {
            const res = await fetch(`${API_URL}/${id}/status`, {
                method: 'POST', // Gunakan POST karena FormData
                body: formData,
                headers: { 'Accept': 'application/json' }
            });
            const result = await res.json();
            
            if(res.ok) {
                alert("Berhasil! Tugas diselesaikan.");
                tutupModal();
                loadTugas();
            } else {
                alert("Gagal update: " + (result.message || "Error server"));
            }
        } catch (err) {
            alert("Kesalahan koneksi!");
        } finally {
            btnSubmit.innerText = "Konfirmasi Selesai";
            btnSubmit.disabled = false;
        }
    };

    // Jalankan pertama kali
    loadTugas();
</script>
</body>
</html>