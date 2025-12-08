<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Data Pendaftar & Kelola Wilayah/Paket</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('storage/gambar/favicon-gintara.png') }}">
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
    .btn-danger{
      padding:8px 12px;border-radius:10px;background:#fee2e2;border:1px solid #fecaca;color:#b91c1c;cursor:pointer;font-weight:700;
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

    /* Paket card admin */
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
    .paket-price{font-size:18px;font-weight:800;color:var(--primary)}
    .paket-desc{font-size:13px;color:var(--muted);margin-top:6px}
    .paket-actions{margin-top:12px;display:flex;gap:8px;align-items:center;justify-content:space-between}

    @media (max-width:980px){
      body{padding:16px}
      .grid{grid-template-columns:1fr}
    }

    .muted{color:var(--muted);font-size:13px}
  </style>
</head>
<body>
  <main class="shell">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px">
      <div>
        <h1>Data Pendaftar</h1>
        <div class="muted">Lihat & kelola pendaftar, wilayah, dan paket</div>
      </div>
      <div class="top-actions">
        <button class="reload-btn" onclick="loadData()">⟳ Muat Ulang</button>
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
              <th>Alamat</th>
              <th>Pesan</th>
              <th>Maps</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr><td colspan="9" class="small">Memuat data...</td></tr>
          </tbody>
        </table>
      </section>

      <!-- RIGHT: kelola wilayah & paket -->
      <aside style="display:flex;flex-direction:column;gap:12px">

        <!-- WILAYAH -->
        <div class="card">
          <h2>Kelola Wilayah</h2>
          <div class="muted">Tambah atau hapus wilayah yang dicover</div>

          <div class="form-row" style="margin-top:10px">
            <input id="wil_nama" class="wide" placeholder="Nama wilayah">
            <input id="wil_ket" class="wide" placeholder="Keterangan (opsional)">
            <button class="reload-btn" onclick="tambahWilayah()">Tambah</button>
          </div>

          <div id="wilayahList" style="margin-top:12px" class="small">Memuat wilayah...</div>
        </div>

        <!-- PAKET -->
        <div class="card">
          <h2>Kelola Paket</h2>
          <div class="muted">Buat / ubah paket & hubungkan wilayah (centang)</div>

          <input type="hidden" id="paket_id_edit">

          <div class="form-row">
            <input id="paket_nama" class="wide" placeholder="Nama paket">
            <input id="paket_harga" class="narrow" placeholder="Harga (angka)">
          </div>

          <div class="form-row">
            <input id="paket_deskripsi" class="wide" placeholder="Deskripsi singkat">
          </div>

          <div style="margin-top:8px;font-size:13px;color:var(--muted);">
            Wilayah paket (centang yang tersedia):
          </div>
          <div id="paket_wilayah_wrapper" style="
              margin-top:6px;
              max-height:150px;
              overflow:auto;
              border-radius:10px;
              border:1px solid rgba(7,19,37,0.06);
              padding:8px 10px;
              background:#ffffff;
              font-size:13px;
          ">
            <div class="small">Memuat wilayah...</div>
          </div>

          <div style="margin-top:10px;display:flex;gap:8px;flex-wrap:wrap">
            <button class="reload-btn" onclick="simpanPaket()" id="btnPaketSave">
              Tambah Paket
            </button>
            <button class="btn-ghost" onclick="resetFormPaket()">
              Reset Form
            </button>
            <button class="btn-ghost" onclick="loadPaketAdmin()">
              Muat Paket
            </button>
          </div>

          <div id="paketAdminList" class="muted" style="margin-top:12px">Memuat paket...</div>
        </div>
      </aside>
    </div>
  </main>

  <script>
    const apiBase = '/api';
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    let semuaPaket = [];    // cache paket untuk edit
    let paketEditId = null; // null = tambah, angka = edit

    // =============== TAMU ===============
    async function loadData(){
      const tbody = document.querySelector('#tamuTable tbody');
      tbody.innerHTML = '<tr><td colspan="9" class="small">Memuat data...</td></tr>';

      try {
        const res = await fetch(apiBase + '/admin/tamu');
        const data = await res.json();

        if(!data.length){
          tbody.innerHTML = '<tr><td colspan="9" class="small">Belum ada pendaftar.</td></tr>';
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
            <td>${escapeHtml(t.full_alamat || '-')}</td>
            <td>${escapeHtml(t.pesan)}</td>
            <td>${t.lokasi ? `<a href="https://www.google.com/maps?q=${t.lokasi}" target="_blank">Buka</a>` : '-'}</td>
            <td class="small">${new Date(t.created_at).toLocaleString('id-ID')}</td>
            <td><button class="btn-danger" onclick="hapusTamu(${t.id})">Hapus</button></td>
          `;
          tbody.appendChild(tr);
        });

      } catch(err){
        console.error(err);
        tbody.innerHTML = '<tr><td colspan="9" class="small">Gagal memuat data.</td></tr>';
      }
    }

    async function hapusTamu(id){
      if(!confirm('Hapus data ini?')) return;
      try {
        const res = await fetch(apiBase + '/admin/tamu/' + id, {
          method:'DELETE',
          headers:{'X-CSRF-TOKEN':csrfToken}
        });
        if(res.ok){
          alert('Data dihapus');
          loadData();
        } else {
          alert('Gagal menghapus data.');
        }
      } catch(err){
        alert('Gagal menghapus data');
      }
    }

    // =============== WILAYAH ===============
    async function refreshWilayahList(){
      const el  = document.getElementById('wilayahList');
      const box = document.getElementById('paket_wilayah_wrapper');

      try {
        const res = await fetch(apiBase + '/wilayah');
        const data = await res.json();

        if(!data.length){
          el.innerHTML  = 'Belum ada wilayah.';
          box.innerHTML = '<div class="small">Belum ada wilayah untuk paket.</div>';
          return;
        }

        // list wilayah
        el.innerHTML = data.map(w => `
          <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px dashed #eef5ff">
            <div>
              <b>${escapeHtml(w.nama)}</b>
              <div class="small">${escapeHtml(w.keterangan || '')}</div>
            </div>
            <button class="btn-ghost" onclick="hapusWilayah(${w.id})">Hapus</button>
          </div>
        `).join('');

        // checkbox wilayah untuk paket
        box.innerHTML = data.map(w => `
          <label style="display:flex;align-items:center;gap:6px;margin-bottom:4px;cursor:pointer">
            <input type="checkbox" class="chk-wilayah-paket" value="${w.id}">
            <span>${escapeHtml(w.nama)}</span>
          </label>
        `).join('');

      } catch(err){
        console.error(err);
        el.innerHTML  = 'Gagal memuat wilayah.';
        box.innerHTML = '<div class="small">Gagal memuat daftar wilayah.</div>';
      }
    }

    async function tambahWilayah(){
      const nama = wil_nama.value.trim();
      const ket  = wil_ket.value.trim();

      if(!nama) return alert('Nama wilayah wajib diisi');

      try {
        await fetch(apiBase + '/wilayah', {
          method:'POST',
          headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':csrfToken
          },
          body:JSON.stringify({nama, keterangan:ket})
        });

        wil_nama.value = '';
        wil_ket.value  = '';

        refreshWilayahList();
      } catch(err){
        alert('Gagal menambah wilayah');
      }
    }

    async function hapusWilayah(id){
      if(!confirm('Hapus wilayah ini?')) return;

      try {
        await fetch(apiBase + '/wilayah/' + id, {
          method:'DELETE',
          headers:{'X-CSRF-TOKEN':csrfToken}
        });

        refreshWilayahList();
        loadPaketAdmin();

      } catch(err){
        alert('Gagal menghapus wilayah');
      }
    }

    // helper checkbox wilayah
    function getCheckedWilayahIds(){
      return Array.from(document.querySelectorAll('.chk-wilayah-paket:checked'))
        .map(cb => parseInt(cb.value));
    }

    function setCheckedWilayahIds(ids){
      const set = new Set((ids || []).map(Number));
      document.querySelectorAll('.chk-wilayah-paket').forEach(cb => {
        cb.checked = set.has(parseInt(cb.value));
      });
    }

    // =============== PAKET ===============
    async function simpanPaket(){
      const nama  = paket_nama.value.trim();
      const harga = paket_harga.value;
      const des   = paket_deskripsi.value.trim();
      const wilayah_id = getCheckedWilayahIds();

      if(!nama || !harga){
        alert("Nama & harga wajib diisi.");
        return;
      }

      const body = JSON.stringify({ nama, harga, deskripsi: des, wilayah_id });

      // mode tambah
      if(!paketEditId){
        try {
          const res = await fetch(apiBase + '/paket', {
            method:'POST',
            headers:{
              'Content-Type':'application/json',
              'X-CSRF-TOKEN': csrfToken
            },
            body
          });

          const data = await res.json().catch(()=>null);

          if(!res.ok){
            console.error('Error simpan paket', res.status, data);
            if(res.status === 422 && data && data.errors){
              alert(Object.values(data.errors).flat().join("\n"));
            }else{
              alert('Gagal menambah paket.');
            }
            return;
          }

          resetFormPaket();
          loadPaketAdmin();
          alert('Paket berhasil ditambahkan.');
        } catch(err){
          console.error(err);
          alert('Gagal menambah paket.');
        }
        return;
      }

      // mode edit
      try {
        const res = await fetch(apiBase + '/paket/' + paketEditId, {
          method:'PUT',
          headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body
        });

        const data = await res.json().catch(()=>null);

        if(!res.ok){
          console.error('Error update paket', res.status, data);
          if(res.status === 422 && data && data.errors){
            alert(Object.values(data.errors).flat().join("\n"));
          }else{
            alert('Gagal mengubah paket.');
          }
          return;
        }

        resetFormPaket();
        loadPaketAdmin();
        alert('Paket berhasil diubah.');

      } catch(err){
        console.error(err);
        alert('Gagal mengubah paket.');
      }
    }

    function resetFormPaket(){
      paketEditId = null;
      document.getElementById('paket_id_edit').value = '';
      paket_nama.value      = '';
      paket_harga.value     = '';
      paket_deskripsi.value = '';
      setCheckedWilayahIds([]);
      const btn = document.getElementById('btnPaketSave');
      if(btn) btn.textContent = 'Tambah Paket';
    }

    async function loadPaketAdmin(){
      const container = document.getElementById('paketAdminList');
      container.innerHTML = 'Memuat paket...';

      try {
        const res = await fetch(apiBase + '/paket');
        const data = await res.json();

        if (!Array.isArray(data) || data.length === 0) {
          semuaPaket = [];
          container.innerHTML = 'Belum ada paket.';
          return;
        }

        semuaPaket = data;

        container.innerHTML = `
          <div style="display:flex;flex-wrap:wrap">
            ${data.map(p => {
              let wilayahInfo = 'Semua wilayah';
              if (Array.isArray(p.wilayah_id) && p.wilayah_id.length) {
                wilayahInfo = p.wilayah_id.length + ' wilayah';
              }

              return `
                <div class="paket-card">
                  <div>
                    <div style="display:flex;justify-content:space-between">
                      <b>${escapeHtml(p.nama)}</b>
                      <div class="paket-price">Rp ${Number(p.harga).toLocaleString('id-ID')}</div>
                    </div>
                    <div class="paket-desc">${escapeHtml(p.deskripsi || '')}</div>
                    <div class="small" style="margin-top:6px">${escapeHtml(wilayahInfo)}</div>
                  </div>
                  <div class="paket-actions">
                    <button class="btn-ghost" onclick="editPaket(${p.id})">Ubah</button>
                    <button class="btn-danger" onclick="hapusPaketAdmin(${p.id})">Hapus</button>
                  </div>
                </div>
              `;
            }).join('')}
          </div>`;
      } catch (err) {
        console.error(err);
        container.innerHTML = 'Gagal memuat paket.';
      }
    }

    function editPaket(id){
      const p = semuaPaket.find(x => x.id === id);
      if(!p){
        alert('Data paket tidak ditemukan.');
        return;
      }

      paketEditId = p.id;
      document.getElementById('paket_id_edit').value = p.id;

      paket_nama.value      = p.nama || '';
      paket_harga.value     = p.harga || '';
      paket_deskripsi.value = p.deskripsi || '';

      setCheckedWilayahIds(p.wilayah_id || []);

      const btn = document.getElementById('btnPaketSave');
      if(btn) btn.textContent = 'Simpan Perubahan';
    }

    async function hapusPaketAdmin(id){
      if(!confirm('Hapus paket ini?')) return;

      try {
        await fetch(apiBase + '/paket/' + id, {
          method:'DELETE',
          headers:{'X-CSRF-TOKEN': csrfToken}
        });
        loadPaketAdmin();
      } catch(err){
        alert('Gagal menghapus paket');
      }
    }

    // util
    function escapeHtml(str){
      if(!str) return '';
      return String(str).replace(/[&<>"'`=\/]/g, s => ({
        '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;','/':'&#x2F;','`':'&#x60;','=':'&#x3D;'
      }[s]));
    }

    document.addEventListener('DOMContentLoaded', () => {
      loadData();
      refreshWilayahList();
      loadPaketAdmin();
    });
  </script>
</body>
</html>
