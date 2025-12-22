<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Teknisi - Admin Gintara</title>

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
      <a href="data-teknisi" class="nav-item active">
        <span class="nav-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span> Data Teknisi
      </a>
      <a href="paket" class="nav-item">
        <span class="nav-icon"><i class="fa-solid fa-box"></i></span> Paket Internet
      </a>
      <div class="nav-label">Laporan & Audit</div>
        <a href="laporan-instalasi" class="nav-item">
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
    <header class="header">
        <div>
            <h1>Manajemen Tim Teknisi</h1>
            <p style="color:var(--text-muted)">Kelola akun dan pantau status teknisi lapangan Gintara.</p>
        </div>
        <button class="btn btn-primary" onclick="openModal()">
            <i class="fa-solid fa-plus"></i> Tambah Teknisi
        </button>
    </header>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Nama Teknisi</th>
                    <th>Kontak / WhatsApp</th>
                    <th>Spesialisasi</th>
                    <th>Area Penugasan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="teknisiTable">
                </tbody>
        </table>
    </div>
</main>

<div id="teknisiModal" class="modal">
    <div class="modal-content">
        <h3 id="modalTitle">Tambah Akun Lapangan</h3>
        <hr style="border:0; border-top:1px solid var(--border); margin:15px 0">
        <form id="teknisiForm">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="nama" class="form-control" required placeholder="Nama Teknisi">
            </div>
            
            <div class="form-group">
                <label>Role Akses (Hak Akses Login)</label>
                <select id="role" class="form-control" required>
                    <option value="Teknisi">Teknisi</option>
                    <option value="Koordinator">Koordinator</option>
                    <option value="Admin Lapangan">Admin Lapangan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Spesialisasi Kerja</label>
                <select id="spesialisasi" class="form-control">
                    <option value="Surveyor">Surveyor</option>
                    <option value="Installer">Installer</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>

            <div class="form-group">
                <label>Area Penugasan</label>
                <input type="text" id="area" class="form-control" placeholder="Contoh: Trusmiland Tahap 1">
            </div>

            <div class="form-group">
                <label>Username / WA</label>
                <input type="text" id="kontak" class="form-control" required placeholder="08xxxx">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ubah (saat edit)">
            </div>

            <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:20px">
                <button type="button" class="btn" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<script>
const API_TEKNISI = 'http://localhost:8000/api/admin/teknisi'; // Sesuaikan URL API Anda

// Data Dummy untuk testing (jika API belum siap)
let dataTeknisi = [
    {id: 1, nama: 'Budi Santoso', kontak: '08123456789', role: 'Teknisi', spesialisasi: 'Installer', area: 'Klayan Tahap 1', status: 'Online'},
    {id: 2, nama: 'Agus Hermawan', kontak: '08771234567', role: 'Koordinator', spesialisasi: 'Surveyor', area: 'Klayan Tahap 2', status: 'Offline'},
    {id: 3, nama: 'Dedi Kurniawan', kontak: '08529876543', role: 'Teknisi', spesialisasi: 'Maintenance', area: 'Semua Area', status: 'Online'}
];

let isEditMode = false;
let currentEditId = null;

// RENDER TABEL
function renderTable() {
    const tbody = document.getElementById('teknisiTable');
    tbody.innerHTML = '';

    dataTeknisi.forEach(t => {
        tbody.innerHTML += `
            <tr>
                <td>
                    <strong>${t.nama}</strong><br>
                    <span class="badge badge-role">${t.role}</span>
                </td>
                <td><i class="fa-brands fa-whatsapp text-success"></i> ${t.kontak}</td>
                <td>${t.spesialisasi}</td>
                <td><small>${t.area || '-'}</small></td>
                <td><span class="badge ${t.status === 'Online' ? 'badge-online' : 'badge-offline'}">${t.status}</span></td>
                <td>
                    <div style="display:flex; gap:8px">
                        <button class="btn" onclick="editTeknisi(${t.id})" title="Edit"><i class="fa-solid fa-user-pen"></i></button>
                        <button class="btn btn-outline-danger" onclick="hapusTeknisi(${t.id})" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        `;
    });
}

// BUKA MODAL (TAMBAH / EDIT)
function openModal(id = null) {
    const modal = document.getElementById('teknisiModal');
    const form = document.getElementById('teknisiForm');
    const title = document.getElementById('modalTitle');
    
    form.reset(); // Bersihkan form
    
    if (id) {
        // MODE EDIT
        isEditMode = true;
        currentEditId = id;
        title.innerText = "Edit Data Teknisi";
        
        const data = dataTeknisi.find(t => t.id === id);
        if (data) {
            document.getElementById('nama').value = data.nama;
            document.getElementById('role').value = data.role;
            document.getElementById('spesialisasi').value = data.spesialisasi;
            document.getElementById('kontak').value = data.kontak;
            // Password dikosongkan saat edit untuk keamanan kecuali ingin diubah
        }
    } else {
        // MODE TAMBAH
        isEditMode = false;
        currentEditId = null;
        title.innerText = "Tambah Akun Lapangan";
    }
    
    modal.style.display = 'flex';
}

function closeModal() {
    document.getElementById('teknisiModal').style.display = 'none';
}

// SIMPAN DATA (CREATE & UPDATE)
document.getElementById('teknisiForm').onsubmit = function(e) {
    e.preventDefault();

    const payload = {
        nama: document.getElementById('nama').value,
        role: document.getElementById('role').value,
        spesialisasi: document.getElementById('spesialisasi').value,
        kontak: document.getElementById('kontak').value,
        status: 'Offline' // Default saat baru dibuat
    };

    if (isEditMode) {
        // Logika Update (Kirim ke API via fetch PATCH/PUT)
        const index = dataTeknisi.findIndex(t => t.id === currentEditId);
        dataTeknisi[index] = { ...dataTeknisi[index], ...payload };
        alert('Data teknisi berhasil diperbarui!');
    } else {
        // Logika Create (Kirim ke API via fetch POST)
        const newId = dataTeknisi.length > 0 ? Math.max(...dataTeknisi.map(t => t.id)) + 1 : 1;
        dataTeknisi.push({ id: newId, ...payload });
        alert('Teknisi baru berhasil ditambahkan!');
    }

    closeModal();
    renderTable();
};

// HAPUS DATA
function hapusTeknisi(id) {
    const data = dataTeknisi.find(t => t.id === id);
    if (confirm(`Apakah Anda yakin ingin menghapus teknisi "${data.nama}"? \nAkses login teknisi ini juga akan terhapus.`)) {
        
        // Di sini tambahkan fetch(API_TEKNISI + '/' + id, { method: 'DELETE' })
        dataTeknisi = dataTeknisi.filter(t => t.id !== id);
        
        renderTable();
    }
}

// Fungsi Trigger untuk Edit (diakses dari tombol di tabel)
window.editTeknisi = function(id) {
    openModal(id);
}

renderTable();
</script>

</body>
</html>