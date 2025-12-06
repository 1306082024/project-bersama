<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin – Daftar Tamu & Kelola Wilayah/Paket</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    :root{
      --bg:#f4f8ff;
      --card:#ffffff;
      --muted:#6b7280;
      --primary:#0b6fd6;
      --accent-2:#06a6ff;
      --radius:12px;
      --shadow: 0 8px 20px rgba(10,40,80,0.06);
      --max-width:1200px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background:var(--bg);
      color:#072244;
      padding:28px;
      display:flex;
      justify-content:center;
    }
    .shell{
      width:100%;
      max-width:var(--max-width);
      display:flex;
      gap:20px;
      align-items:flex-start;
      flex-direction:column;
    }

    h1{margin:0 0 8px;font-size:22px}
    h2{margin:0 0 8px;font-size:16px}

    .top-actions{display:flex;gap:12px;align-items:center;margin-bottom:8px}
    .reload-btn{
      padding:10px 14px;border-radius:10px;background:linear-gradient(90deg,var(--primary),var(--accent-2));color:#fff;border:0;font-weight:700;cursor:pointer;
    }
    .btn-ghost{
      padding:8px 12px;border-radius:10px;background:#fff;border:1px solid rgba(7,19,37,0.06);color:var(--primary);cursor:pointer;font-weight:700;
    }

    .grid{
      display:grid;
      grid-template-columns: 1fr 420px;
      gap:20px;
      width:100%;
    }

    .card{
      background:var(--card);
      padding:16px;border-radius:12px;box-shadow:var(--shadow);border:1px solid rgba(7,19,37,0.04);
    }

    /* TABEL */
    table{
      width:100%;
      border-collapse:collapse;
      font-size:14px;
    }
    th, td{padding:10px 12px;border-bottom:1px solid rgba(7,19,37,0.06);vertical-align:top;text-align:left}
    thead th{background:#eef5ff;color:#072244;font-weight:700}
    tr:hover{background:#fbfdff}
    .small{font-size:13px;color:var(--muted)}

    /* Form admin */
    .form-row{display:flex;gap:8px;flex-wrap:wrap;margin-top:8px}
    .form-row input, .form-row select, .form-row textarea{
      padding:8px 10px;border-radius:10px;border:1px solid rgba(7,19,37,0.06);background:#fff;font-size:14px;
    }
    .form-row .wide{flex:1 1 220px}
    .form-row .narrow{width:120px}

    /* Paket card admin + frontend */
    .paket-card{
      background: linear-gradient(180deg,#fff,#f7fbff);
      border-radius:12px;
      padding:12px;
      width:240px;
      box-shadow:0 8px 20px rgba(10,40,80,0.05);
      border:1px solid rgba(7,19,37,0.04);
      display:flex;
      flex-direction:column;
      justify-content:space-between;
      margin:8px;
      box-sizing:border-box;
    }
    .paket-grid{display:flex;flex-wrap:wrap;gap:12px;margin-top:12px}
    .paket-price{font-size:18px;font-weight:800;color:var(--primary)}
    .paket-desc{font-size:13px;color:var(--muted);margin-top:6px}
    .paket-actions{margin-top:12px;display:flex;gap:8px;align-items:center;justify-content:space-between}
    .btn-subscribe{background:linear-gradient(90deg,var(--primary),var(--accent-2));color:#fff;padding:8px 10px;border-radius:10px;border:0;font-weight:700;cursor:pointer}

    /* responsive */
    @media (max-width:980px){
      body{padding:16px}
      .grid{grid-template-columns:1fr}
    }

    /* kecil */
    .muted{color:var(--muted);font-size:13px}
    .danger{color:#c0262e}
    .pill{padding:6px 8px;border-radius:8px;background:#f1f5f9;font-size:13px}
  </style>
</head>
<body>
  <main class="shell">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px">
      <div>
        <h1>📋 Daftar Tamu</h1>
        <div class="muted">Lihat & kelola tamu, wilayah, dan paket</div>
      </div>
      <div class="top-actions">
        <button class="reload-btn" onclick="loadData()">⟳ Muat Ulang</button>
        <button class="btn-ghost" onclick="refreshWilayahList()">Muat Wilayah</button>
      </div>
    </div>

    <div class="grid">
      <!-- LEFT: daftar tamu -->
      <section class="card" aria-label="Daftar Tamu">
        <table id="tamuTable" role="table" aria-label="Daftar tamu">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kontak</th>
              <th>Wilayah</th>
              <th>Paket</th>
              <th>Pesan</th>
              <th>Lokasi</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <tr><td colspan="7" class="small">Memuat data...</td></tr>
          </tbody>
        </table>
      </section>

      <!-- RIGHT: kelola wilayah & paket -->
      <aside style="display:flex;flex-direction:column;gap:12px">
        <div class="card" aria-label="Kelola Wilayah">
          <h2>Kelola Wilayah</h2>
          <div class="muted">Tambah atau hapus wilayah yang dicover</div>

          <div class="form-row" style="margin-top:10px">
            <input id="wil_nama" class="wide" placeholder="Nama wilayah (contoh: Klayan Tahap 1)">
            <input id="wil_ket" class="wide" placeholder="Keterangan (opsional)">
            <button class="reload-btn" onclick="tambahWilayah()">Tambah Wilayah</button>
          </div>

          <div id="wilayahList" style="margin-top:12px" class="small">Memuat wilayah...</div>
        </div>

        <div class="card" aria-label="Kelola Paket">
          <h2>Kelola Paket</h2>
          <div class="muted">Buat paket baru dan kaitkan ke wilayah yang tersedia (Ctrl/Cmd+klik untuk pilih banyak)</div>

          <div class="form-row" style="margin-top:10px">
            <input id="paket_nama" class="wide" placeholder="Nama paket (Hemat/Puas/Mantap)">
            <input id="paket_harga" class="narrow" placeholder="Harga (angka)">
          </div>
          <div class="form-row" style="margin-top:8px">
            <input id="paket_deskripsi" class="wide" placeholder="Deskripsi singkat">
            <select id="paket_wilayah" multiple class="wide" style="min-height:40px"></select>
          </div>
          <div style="margin-top:10px;display:flex;gap:8px;align-items:center">
            <button class="reload-btn" onclick="tambahPaket()">Tambah Paket</button>
            <button class="btn-ghost" onclick="loadPaketAdmin()">Muat Paket</button>
          </div>

          <div id="paketAdminList" class="muted" style="margin-top:12px">Memuat paket...</div>
        </div>
      </aside>
    </div>
  </main>

  <script>
    const apiBase = '/api';
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    // ---------- Tamu ----------
    async function loadData(){
      const tbody = document.querySelector('#tamuTable tbody');
      tbody.innerHTML = '<tr><td colspan="7" class="small">Memuat data...</td></tr>';
      try {
        const res = await fetch(apiBase + '/admin/tamu');
        if(!res.ok) throw new Error('Gagal memuat tamu');
        const data = await res.json();
        if(!Array.isArray(data) || data.length === 0){
          tbody.innerHTML = '<tr><td colspan="7" class="small">Belum ada tamu.</td></tr>';
          return;
        }
        tbody.innerHTML = '';
        data.forEach(t => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${escapeHtml(t.nama)}</td>
            <td>${escapeHtml(t.kontak || '-')}</td>
            <td>${escapeHtml(t.wilayah?.nama || '-')}</td>
            <td>${escapeHtml(t.paket?.nama || '-')}</td>
            <td>${escapeHtml(t.pesan)}</td>
            <td>${t.lokasi ? `<a href="https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(t.lokasi)}" target="_blank">Buka</a>` : '-'}</td>
            <td class="small">${new Date(t.created_at).toLocaleString('id-ID')}</td>
          `;
          tbody.appendChild(tr);
        });
      } catch (err) {
        console.error(err);
        tbody.innerHTML = '<tr><td colspan="7" class="small">Gagal memuat data tamu.</td></tr>';
      }
    }

    // ---------- Wilayah (CRUD) ----------
    async function refreshWilayahList(){
      const el = document.getElementById('wilayahList');
      try {
        const res = await fetch(apiBase + '/wilayah');
        if(!res.ok) throw new Error('Gagal memuat wilayah');
        const data = await res.json();
        if(!Array.isArray(data) || data.length === 0){
          el.innerHTML = '<div class="small">Belum ada wilayah.</div>';
          populateWilayahSelect([]);
          return;
        }
        el.innerHTML = data.map(w => `
          <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px dashed #eef5ff">
            <div><strong>${escapeHtml(w.nama)}</strong><div class="small">${escapeHtml(w.keterangan || '')}</div></div>
            <div style="display:flex;gap:8px">
              <button class="btn-ghost" onclick="hapusWilayah(${w.id})">Hapus</button>
            </div>
          </div>
        `).join('');
        populateWilayahSelect(data);
      } catch(err){
        console.error(err);
        el.innerHTML = '<div class="small">Gagal memuat wilayah.</div>';
      }
    }

    function populateWilayahSelect(list){
      const sel = document.getElementById('paket_wilayah');
      sel.innerHTML = '';
      list.forEach(w => {
        const opt = document.createElement('option');
        opt.value = w.id; opt.textContent = w.nama;
        sel.appendChild(opt);
      });
    }

    async function tambahWilayah(){
      const nama = document.getElementById('wil_nama').value.trim();
      const ket = document.getElementById('wil_ket').value.trim();
      if(!nama){ alert('Nama wilayah wajib'); return; }
      try {
        const res = await fetch(apiBase + '/wilayah', {
          method: 'POST',
          headers: {'Content-Type':'application/json','X-CSRF-TOKEN': csrfToken},
          body: JSON.stringify({nama: nama, keterangan: ket})
        });
        if(!res.ok) throw new Error('Gagal menambah wilayah');
        document.getElementById('wil_nama').value = '';
        document.getElementById('wil_ket').value = '';
        alert('Wilayah ditambahkan');
        refreshWilayahList();
      } catch(err){
        console.error(err);
        alert('Gagal menambah wilayah. Lihat console untuk detail.');
      }
    }

    async function hapusWilayah(id){
      if(!confirm('Hapus wilayah ini?')) return;
      try {
        const res = await fetch(apiBase + '/wilayah/' + id, {
          method: 'DELETE',
          headers: {'X-CSRF-TOKEN': csrfToken}
        });
        if(!res.ok) throw new Error('Gagal menghapus');
        alert('Wilayah dihapus');
        refreshWilayahList();
        loadPaketAdmin();
      } catch(err){
        console.error(err);
        alert('Gagal menghapus wilayah.');
      }
    }

    // ---------- Paket (CRUD) ----------
async function tambahPaket(){
  const nama = document.getElementById('paket_nama').value.trim();
  const harga = parseFloat(document.getElementById('paket_harga').value);
  const des = document.getElementById('paket_deskripsi').value.trim();
  const sel = Array.from(document.getElementById('paket_wilayah').selectedOptions).map(o => parseInt(o.value));
  if(!nama || isNaN(harga)){ alert('Nama dan harga wajib'); return; }

  try {
    const res = await fetch(apiBase + '/paket', {
      method: 'POST',
      headers: {'Content-Type':'application/json','X-CSRF-TOKEN': csrfToken},
      body: JSON.stringify({nama: nama, harga: harga, deskripsi: des, wilayah_id: sel})
    });

    const data = await res.json().catch(()=>null);

    if(!res.ok){
      console.error('Error response', res.status, data);
      if(res.status === 422 && data && data.errors){
        const msgs = Object.values(data.errors).flat().join('\n');
        alert('Validasi gagal:\n' + msgs);
      } else if(data && data.message){
        alert('Error: ' + data.message);
      } else {
        alert('Gagal menambah paket. Cek console atau laravel.log');
      }
      return;
    }

    document.getElementById('paket_nama').value = '';
    document.getElementById('paket_harga').value = '';
    document.getElementById('paket_deskripsi').value = '';
    alert('Paket ditambahkan');
    loadPaketAdmin();
  } catch(err){
    console.error(err);
    alert('Gagal menambah paket. Lihat console untuk detail.');
  }
}


    async function hapusPaketAdmin(id){
      if(!confirm('Hapus paket ini?')) return;
      try {
        const res = await fetch(apiBase + '/paket/' + id, {
          method: 'DELETE',
          headers: {'X-CSRF-TOKEN': csrfToken}
        });
        if(!res.ok) throw new Error('Gagal menghapus paket');
        alert('Paket dihapus');
        loadPaketAdmin();
      } catch(err){
        console.error(err);
        alert('Gagal menghapus paket.');
      }
    }

    async function loadPaketAdmin(){
      const container = document.getElementById('paketAdminList');
      container.innerHTML = '<div class="small">Memuat paket...</div>';
      try {
        const res = await fetch(apiBase + '/paket/wilayah/0');
        if(!res.ok) throw new Error('Gagal memuat paket');
        const data = await res.json();
        if(!Array.isArray(data) || data.length === 0){
          container.innerHTML = '<div class="small">Belum ada paket.</div>';
          return;
        }
        // tampilkan kartu paket
        const html = data.map(p => {
          const wilayahInfo = (p.wilayah_id && p.wilayah_id.length) ? ('Tersedia di ' + p.wilayah_id.length + ' wilayah') : 'Tersedia di semua wilayah';
          return `<div class="paket-card">
            <div>
              <div style="display:flex;justify-content:space-between;align-items:center">
                <div style="font-weight:800">${escapeHtml(p.nama)}</div>
                <div class="paket-price">Rp ${Number(p.harga).toLocaleString('id-ID')}</div>
              </div>
              <div class="paket-desc">${escapeHtml(p.deskripsi || '')}</div>
              <div class="small" style="margin-top:6px">${escapeHtml(wilayahInfo)}</div>
            </div>
            <div class="paket-actions">
              <button class="btn-ghost" onclick="editPaket(${p.id})">Ubah</button>
              <button class="btn-subscribe" onclick="hapusPaketAdmin(${p.id})">Hapus</button>
            </div>
          </div>`;
        }).join('');
        container.innerHTML = `<div style="display:flex;flex-wrap:wrap">${html}</div>`;
      } catch(err){
        console.error(err);
        container.innerHTML = '<div class="small">Gagal memuat paket.</div>';
      }
    }

    function editPaket(id){
      alert('Fitur edit paket belum diimplementasikan di UI ini. Bisa ditambahkan bila diperlukan.');
    }

    // ---------- util ----------
    function escapeHtml(s){
      if(!s && s !== 0) return '';
      return String(s).replace(/[&<>"'`=\/]/g, function (c) {
        return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;','/':'&#x2F;','`':'&#x60;','=':'&#x3D;'}[c];
      });
    }

    // ---------- init ----------
    document.addEventListener('DOMContentLoaded', function(){
      loadData();
      refreshWilayahList();
      loadPaketAdmin();
    });
  </script>
</body>
</html>
