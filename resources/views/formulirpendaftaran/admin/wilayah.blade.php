<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Wilayah - Admin Gintara</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --primary:#0b6fd6;
  --primary-dark:#074e9e;
  --bg-body:#f4f7fa;
  --bg-card:#fff;
  --text-main:#1f2937;
  --text-muted:#6b7280;
  --border:#e5e7eb;
  --danger:#ef4444;
  --sidebar-width:260px;
  --shadow:0 4px 6px -1px rgba(0,0,0,.05),0 2px 4px -1px rgba(0,0,0,.03)
}
*{box-sizing:border-box}
body{
  margin:0;font-family:Inter;background:var(--bg-body);
  display:flex;min-height:100vh;color:var(--text-main)
}

/* ================= SIDEBAR ================= */
.sidebar {
  width: var(--sidebar-width);
  background: var(--bg-card);
  border-right: 1px solid var(--border);
  position: fixed;
  height: 100%;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  z-index: 10;
}

.nav {
  padding: 20px 16px;
  flex: 1;
}

.nav-label {
  font-size: 11px;
  text-transform: uppercase;
  color: var(--text-muted);
  letter-spacing: 0.5px;
  margin: 20px 0 10px 12px;
  font-weight: 600;
}

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
  transition: .2s;
}

.nav-item:hover {
  background: #f0f7ff;
  color: var(--primary);
}

.nav-item.active {
  background: var(--primary);
  color: white;
  box-shadow: 0 4px 12px rgba(11,111,214,.2);
}

.nav-icon {
  margin-right: 12px;
  width: 20px;
  text-align: center;
}

/* MAIN */
.main{margin-left:var(--sidebar-width);flex:1;padding:30px}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px}
.header h1{margin:0;font-size:24px}
.avatar{width:40px;height:40px;border-radius:50%;background:#e0e7ff;color:var(--primary);display:flex;align-items:center;justify-content:center;font-weight:700}

/* CARD */
.card{background:#fff;border-radius:12px;padding:20px;border:1px solid var(--border);box-shadow:var(--shadow)}

/* FORM */
label{font-size:13px;color:var(--text-muted)}
input,textarea{
  width:100%;padding:10px;border-radius:8px;border:1px solid var(--border);
  font-size:14px;margin-top:4px
}
textarea{resize:vertical}

/* BUTTON */
.btn{padding:8px 12px;border-radius:8px;border:1px solid var(--border);background:#fff;cursor:pointer;font-size:13px}
.btn-primary{background:var(--primary);color:#fff;border:none}
.btn-primary:hover{background:var(--primary-dark)}
.btn-danger{background:var(--danger);color:#fff;border:none}
.btn-danger:hover{background:#dc2626}

/* TABLE */
table{width:100%;border-collapse:collapse;font-size:14px}
th,td{padding:14px;border-bottom:1px solid var(--border);vertical-align:top}
th{background:#f9fafb;color:var(--text-muted);text-align:left}

/* MODAL */
.modal{
  position:fixed;inset:0;background:rgba(0,0,0,.4);
  display:none;align-items:center;justify-content:center;z-index:999
}
.modal-box{
  background:#fff;padding:20px;border-radius:12px;width:420px
}

/* RESPONSIVE */
@media(max-width:768px){
  .sidebar{display:none}
  .main{margin-left:0}
}
</style>
</head>

<body>

<aside class="sidebar">
    <nav class="nav">
      <a href="dashboardA" class="nav-item">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Data Pendaftar
      </a>
      <a href="pelanggan" class="nav-item">
        <span class="nav-icon">👥</span> Data Pelanggan
      </a>
      <a href="wilayah" class="nav-item active">
        <span class="nav-icon">🌍</span> Kelola Wilayah
      </a>
      <a href="paket" class="nav-item">
        <span class="nav-icon">📦</span> Paket Internet
      </a>

      <div class="nav-label" style="margin-top:20px">Settings</div>
      <a href="pengaturan" class="nav-item">
        <span class="nav-icon">⚙️</span> Pengaturan
      </a>
      <a href="#" class="nav-item">
        <span class="nav-icon">🚪</span> Logout
      </a>
    </nav>
  </aside>

<main class="main">

<header class="header">
  <div>
    <h1>Kelola Wilayah</h1>
    <p style="color:var(--text-muted);font-size:14px">Atur wilayah cakupan & keterangan</p>
  </div>
  <div style="display:flex;gap:12px;align-items:center">
    <div style="text-align:right">
      <strong>Administrator</strong><br>
      <small style="color:var(--text-muted)">Admin</small>
    </div>
    <div class="avatar">A</div>
  </div>
</header>

<div style="display:grid;grid-template-columns:1.2fr 1fr;gap:20px">

  <!-- LIST -->
  <div class="card">
    <h3 style="margin-top:0">Daftar Wilayah</h3>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Keterangan</th>
          <th style="width:130px">Aksi</th>
        </tr>
      </thead>
      <tbody id="wilayahTable"></tbody>
    </table>
  </div>

  <!-- FORM CREATE -->
  <div class="card">
    <h3 style="margin-top:0">Tambah Wilayah</h3>

    <label>Nama</label>
    <input id="namaWilayah">

    <label style="margin-top:10px;display:block">Slug (opsional)</label>
    <input id="slugWilayah">

    <label style="margin-top:10px;display:block">Keterangan</label>
    <textarea id="ketWilayah" rows="3"></textarea>

    <button class="btn btn-primary" style="margin-top:14px;width:100%" onclick="simpanWilayah()">
      Simpan
    </button>
  </div>

</div>

</main>

<!-- MODAL EDIT -->
<div class="modal" id="editModal">
  <div class="modal-box">
    <h3>Edit Wilayah</h3>

    <label>Nama</label>
    <input id="editNama">

    <label style="margin-top:10px;display:block">Slug</label>
    <input id="editSlug">

    <label style="margin-top:10px;display:block">Keterangan</label>
    <textarea id="editKet" rows="3"></textarea>

    <div style="display:flex;justify-content:flex-end;gap:8px;margin-top:14px">
      <button class="btn" onclick="closeEdit()">Batal</button>
      <button class="btn btn-primary" onclick="updateWilayah()">Update</button>
    </div>
  </div>
</div>

<script>
const API='/api/wilayah';
let editId=null;

/* LOAD */
function loadWilayah(){
  fetch(API).then(r=>r.json()).then(data=>{
    const tb=document.getElementById('wilayahTable');
    tb.innerHTML='';
    if(!data.length){
      tb.innerHTML=`<tr><td colspan="3" style="text-align:center;color:#6b7280">Belum ada wilayah</td></tr>`;
      return;
    }
    data.forEach(w=>{
      tb.innerHTML+=`
      <tr>
        <td><strong>${w.nama}</strong><br><small>${w.slug||''}</small></td>
        <td>${w.keterangan||'-'}</td>
        <td>
          <button class="btn" onclick='openEdit(${JSON.stringify(w)})'>Edit</button>
          <button class="btn btn-danger" onclick="hapusWilayah(${w.id})">Hapus</button>
        </td>
      </tr>`;
    });
  });
}

/* CREATE */
function simpanWilayah(){
  const nama=namaWilayah.value.trim();
  const slug=slugWilayah.value.trim();
  const keterangan=ketWilayah.value.trim();
  if(!nama){alert('Nama wajib diisi');return;}

  fetch(API,{
    method:'POST',
    headers:{'Content-Type':'application/json','Accept':'application/json'},
    body:JSON.stringify({nama,slug,keterangan})
  })
  .then(r=>{if(!r.ok) return r.json().then(e=>{throw e});})
  .then(()=>{
    namaWilayah.value=slugWilayah.value=ketWilayah.value='';
    loadWilayah();
  })
  .catch(e=>alert(e.errors?.nama?.[0]||'Gagal simpan'));
}

/* EDIT */
function openEdit(w){
  editId=w.id;
  editNama.value=w.nama;
  editSlug.value=w.slug||'';
  editKet.value=w.keterangan||'';
  editModal.style.display='flex';
}
function closeEdit(){editModal.style.display='none';}

/* UPDATE */
function updateWilayah(){
  fetch(`${API}/${editId}`,{
    method:'PUT',
    headers:{'Content-Type':'application/json','Accept':'application/json'},
    body:JSON.stringify({
      nama:editNama.value,
      slug:editSlug.value,
      keterangan:editKet.value
    })
  })
  .then(()=>{closeEdit();loadWilayah();});
}

/* DELETE */
function hapusWilayah(id){
  if(!confirm('Hapus wilayah ini?'))return;
  fetch(`${API}/${id}`,{method:'DELETE'}).then(loadWilayah);
}

loadWilayah();
</script>

</body>
</html>
