<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Buku Tamu Gintara</title>
  <meta name="description" content="Landing page buku tamu Gintara — paket Internet Rumah (Hemat, Puas, Mantap)." />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg:#f6fbff;
      --card:#ffffff;
      --muted:#6b7280;
      --primary:#0b6fd6;
      --accent:#1190ff;
      --accent-2:#06a6ff;
      --radius:12px;
      --max-width:1280px;
      --shadow: 0 10px 30px rgba(10,40,80,0.06);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;
      background:linear-gradient(180deg,#f8fbff 0%, #ffffff 100%);
      color:#072244;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      display:flex;
      justify-content:center;
      padding:28px;
    }

    .shell{
      width:100%;
      max-width:var(--max-width);
      display:flex;
      flex-direction:column;
      gap:20px;
    }

    .hero{
      display:flex;
      gap:20px;
      align-items:center;
      background:linear-gradient(90deg,#fff,#fbfdff);
      padding:28px;
      border-radius:16px;
      box-shadow:var(--shadow);
      border:1px solid rgba(7,19,37,0.04);
    }
    .brand{
      display:flex;gap:14px;align-items:center;
    }
    .logo{
      width:90px;height:90px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:28px;box-shadow:0 10px 30px rgba(11,111,214,0.12)
    }
    .logo img{
      width:100%;
      height:100%;
      object-fit:contain;
      border-radius:10px;
    }
    .hero-left{flex:1}
    .kicker{color:var(--primary);font-weight:700;font-size:13px}
    .hero-title{font-size:28px;margin:8px 0 6px;color:#042244;line-height:1.05}
    .hero-sub{color:var(--muted);margin:0;font-size:15px}

    .hero-cta{display:flex;gap:12px;margin-top:14px}
    .btn{
      padding:12px 16px;border-radius:10px;font-weight:700;border:0;cursor:pointer;
    }
    .btn-primary{background:linear-gradient(90deg,var(--primary),var(--accent-2));color:#fff;box-shadow:0 10px 24px rgba(11,111,214,0.12)}
    .btn-ghost{background:#fff;border:1px solid rgba(7,19,37,0.06);color:var(--primary)}

    .hero-right{
      min-width:240px;text-align:right;
    }
    .hero-card{
      background:#fff;padding:12px;border-radius:10px;border:1px solid rgba(7,19,37,0.04)
    }
    .hero-card .label{font-weight:700;color:var(--primary)}

    .grid{
      display:grid;
      grid-template-columns: 420px 1fr 360px;
      gap:20px;
      align-items:start;
    }
    .card{
      background:var(--card);
      padding:18px;border-radius:12px;box-shadow:var(--shadow);border:1px solid rgba(7,19,37,0.04);
    }
    h2,h3{margin:0 0 8px}

    label{display:block;font-size:13px;color:var(--muted);margin-bottom:6px}
    input[type="text"], input[type="email"], textarea, select, .search{
      width:100%;padding:10px 12px;border-radius:10px;border:1px solid rgba(7,19,37,0.06);background:#fff;font-size:14px;color:inherit;outline:none;
    }
    textarea{min-height:120px;resize:vertical}
    .form-actions{display:flex;gap:10px;margin-top:12px;flex-wrap:wrap}
    .hint{font-size:13px;color:var(--muted);margin-top:8px}

    .packages{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}
    .pkg{padding:8px 10px;border-radius:10px;background:#f1f8ff;border:1px solid rgba(11,111,214,0.06);color:var(--primary);font-weight:700}

    .table{
      width:100%;
      border-collapse:collapse;
      background:#fff;border-radius:10px;overflow:hidden;border:1px solid rgba(7,19,37,0.04);
    }
    .table th, .table td{padding:12px 14px;border-bottom:1px solid rgba(7,19,37,0.04);text-align:left;font-size:14px}
    .table thead th{background:#f1f7ff;color:#042244}
    .table tbody tr:hover{background:#fbfdff}
    .small{font-size:13px;color:var(--muted)}

    .list{display:flex;flex-direction:column;gap:12px;max-height:62vh;overflow:auto;padding-right:6px}
    .entry{display:flex;gap:12px;align-items:flex-start;padding:12px;border-radius:10px;border:1px solid rgba(7,19,37,0.04);background:#fff}
    .avatar{width:56px;height:56px;border-radius:10px;background:linear-gradient(135deg,var(--primary),var(--accent-2));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:16px;flex-shrink:0}
    .controls{display:flex;gap:8px}
    .small-btn{padding:6px 8px;border-radius:8px;border:1px solid rgba(7,19,37,0.06);background:#fff;cursor:pointer;color:var(--muted);font-weight:600}

    @media (max-width:1100px){
      .grid{grid-template-columns: 1fr 360px}
      .hero-right{display:none}
    }
    @media (max-width:820px){
      .grid{display:flex;flex-direction:column}
      .list{max-height:48vh}
      .table{font-size:13px}
      .hero{flex-direction:column;align-items:flex-start}
      .hero-right{display:none}
    }

    .hidden{display:none}
    .u-right{text-align:right}
  </style>
</head>
<body>
  <main class="shell" id="app">
    <!-- HERO -->
    <section class="hero" aria-label="Hero Buku Tamu">
      <div class="hero-left">
        <div style="display:flex;align-items:center;gap:14px">
          <div class="logo">
            <img src="{{ asset('storage/gambar/gintara.png') }}" alt="gintara">
          </div>
          <div>
            <div class="kicker">GINTARA.NET • Internet Rumah</div>
            <h1 class="hero-title">Butuh Internet Rumah Cepat & Stabil?</h1>
            <p class="hero-sub">Pilih paket Hemat / Puas / Mantap — atau tinggalkan pesan untuk tim pemasangan kami.</p>
          </div>
        </div>

        <div class="hero-cta">
          <button class="btn btn-primary" onclick="document.getElementById('name').focus()">Isi Sekarang</button>
          <button class="btn btn-ghost" onclick="document.getElementById('paket').focus()">Lihat Paket</button>
        </div>
      </div>

      <div class="hero-right">
        <div class="hero-card">
          <div class="label">Paket Mantap</div>
          <div class="small" style="margin-top:6px">Unlimited • Kecepatan Tinggi • Pasang Cepat</div>
          <div class="hint" style="margin-top:8px">Hubungi tim untuk promo pemasangan.</div>
        </div>
      </div>
    </section>

    <!-- MAIN GRID -->
    <section class="grid" aria-label="Konten Utama">
      <!-- LEFT: Form -->
      <aside class="card" aria-labelledby="form-title">
        <h2 id="form-title">Buku Tamu</h2>
        <p class="small">Isi data singkat — No. HP dan Pesan wajib diisi.</p>

        <form id="guestForm" autocomplete="off" novalidate>
          <!-- honeypot untuk bot -->
          <input type="text" id="hp" name="hp" class="hidden" />

          <label for="name">Nama <span style="color:var(--primary)">*</span></label>
          <input id="name" name="name" type="text" placeholder="Nama lengkap" required />

          <label for="email" style="margin-top:10px">Email / WhatsApp (opsional)</label>
          <input id="email" name="email" type="text" placeholder="0812xxx / contoh@gmail.com" />

          <label for="paket" style="margin-top:10px">Paket yang diminati (opsional)</label>
          <select id="paket" name="paket">
            <option value="">— Pilih paket —</option>
            <option value="hemat">Hemat</option>
            <option value="puas">Puas</option>
            <option value="mantap">Mantap</option>
          </select>

          <label for="message" style="margin-top:10px">Pesan / Keterangan <span style="color:var(--primary)">*</span></label>
          <textarea id="message" name="message" placeholder="Contoh: saya ingin pasang paket Mantap..." required></textarea>

          <div class="packages" aria-hidden="false">
            <div class="pkg">Unlimited</div>
            <div class="pkg" style="background:#fff;border:1px solid rgba(7,19,37,0.04);color:var(--muted)">Voucher</div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            <button type="button" id="clearAll" class="btn btn-ghost">Hapus Semua</button>
            <button type="button" id="exportCsv" class="btn btn-ghost">Ekspor CSV</button>
          </div>

        </form>
      </aside>

      <article class="card" aria-labelledby="summary-title">
        <h3 id="summary-title">Ringkasan Entri Terbaru</h3>

        <div style="overflow:auto">
          <table class="table" id="table" aria-live="polite">
            <thead>
              <tr>
                <th style="width:70px">Inisial</th>
                <th style="width:260px">Nama & Paket</th>
                <th>Pesan</th>
                <th style="width:160px">Kontak</th>
                <th style="width:160px">Waktu</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <tr id="emptyRow"><td colspan="5"><div class="small">Belum ada entri.</div></td></tr>
            </tbody>
          </table>
        </div>
      </article>

      <aside class="card" aria-labelledby="list-title">
        <div style="display:flex;gap:8px;align-items:center;margin-bottom:8px">
          <h3 id="list-title" style="margin:0">Daftar Entri</h3>
          <input id="search" class="search" placeholder="Cari nama/pesan/nomor..." style="margin-left:auto" />
        </div>

        <div class="list" id="list">
          <div class="entry empty" id="emptyEntry">Belum ada entri.</div>
        </div>

        <div style="margin-top:12px">
          <button class="btn btn-ghost" style="width:100%" onclick="downloadCSV()">Download CSV</button>
        </div>
      </aside>
    </section>

    <footer style="text-align:center;color:var(--muted);font-size:13px;padding-top:6px">© GINTARA.NET • Layanan Internet Rumah</footer>
  </main>

  <script>
    /************************************************************************
     * STORAGE & SERVER SETTINGS
     * To enable server submission:
     *  - Set SEND_TO_SERVER = true
     *  - Update SERVER_URL to your endpoint (ensure CORS & CSRF are handled)
     *  - SERVER_EXPECTS_JSON: true => sends application/json
     **************************************************************************/
    const SEND_TO_SERVER = false; // ubah ke true jika ingin POST ke server
    const SERVER_URL = 'https://setwanjombang.com/buku-tamu/create';
    const SERVER_EXPECTS_JSON = true;

    const STORAGE_KEY = 'gintara_landing_bukutamu_v1';
    const form = document.getElementById('guestForm');
    const listEl = document.getElementById('list');
    const emptyEntry = document.getElementById('emptyEntry');
    const tbody = document.getElementById('tbody');
    const emptyRow = document.getElementById('emptyRow');
    const searchInput = document.getElementById('search');

    let entries = load();

    function load(){
      try{
        const raw = localStorage.getItem(STORAGE_KEY);
        return raw ? JSON.parse(raw) : [];
      }catch(e){
        console.error('load error', e);
        return [];
      }
    }
    function save(){
      try{ localStorage.setItem(STORAGE_KEY, JSON.stringify(entries)); }
      catch(e){ console.error('save error', e); }
    }

    /* escapeHtml aman */
    function escapeHtml(s){
      if(s === null || s === undefined) return '';
      return String(s)
        .replace(/&/g,'&amp;')
        .replace(/</g,'&lt;')
        .replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;')
        .replace(/'/g,'&#39;')
        .replace(/\n/g,'<br>');
    }

    function avatarLetters(name){
      if(!name) return 'G';
      const parts = name.trim().split(/\s+/);
      if(parts.length === 1) return parts[0].slice(0,2).toUpperCase();
      return (parts[0][0] + parts[parts.length-1][0]).toUpperCase();
    }

    function formatDate(iso){
      const d = new Date(iso);
      return d.toLocaleString('id-ID', {year:'numeric', month:'short', day:'numeric', hour:'2-digit', minute:'2-digit'});
    }

    /* Render (right compact list + center table + mobile card fallback) */
    function render(filter=''){
      // build filtered list
      const filtered = entries
        .filter(e => {
          if(!filter) return true;
          const q = filter.toLowerCase();
          return (e.name||'').toLowerCase().includes(q) ||
                 (e.message||'').toLowerCase().includes(q) ||
                 (e.email||'').toLowerCase().includes(q) ||
                 (e.paket||'').toLowerCase().includes(q);
        })
        .sort((a,b) => new Date(b.createdAt) - new Date(a.createdAt));

      // right compact list
      listEl.innerHTML = '';
      if(filtered.length === 0){
        listEl.appendChild(emptyEntry);
      } else {
        filtered.forEach(e => {
          const item = document.createElement('div');
          item.className = 'entry';
          item.innerHTML = `
            <div class="avatar">${avatarLetters(e.name)}</div>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:center">
                <div>
                  <div style="font-weight:700">${escapeHtml(e.name)}</div>
                  <div class="small">${e.paket ? escapeHtml(capitalize(e.paket)) : '<span style="color:var(--muted)">- paket -</span>'}</div>
                </div>
                <div class="small">${formatDate(e.createdAt)}</div>
              </div>
              <div style="margin-top:8px">${escapeHtml(e.message)}</div>
            </div>
          `;
          listEl.appendChild(item);
        });
      }

      // center table
      tbody.innerHTML = '';
      if(filtered.length === 0){
        tbody.appendChild(emptyRow);
      } else {
        filtered.forEach(e => {
          const tr = document.createElement('tr');
          tr.innerHTML = `
            <td style="vertical-align:top">
              <div style="width:46px;height:46px;border-radius:8px;background:linear-gradient(135deg,var(--primary),var(--accent-2));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700">${avatarLetters(e.name)}</div>
            </td>
            <td style="vertical-align:top">
              <div style="font-weight:700">${escapeHtml(e.name)}</div>
              <div class="small">${escapeHtml(e.paket || e.email || '')}</div>
            </td>
            <td style="vertical-align:top">${escapeHtml(e.message)}</td>
            <td style="vertical-align:top" class="small">${escapeHtml(e.email || '')}</td>
            <td style="vertical-align:top" class="small">${formatDate(e.createdAt)}</td>
          `;
          tbody.appendChild(tr);
        });
      }
    }

    /* helpers */
    function capitalize(s){ if(!s) return ''; return s.charAt(0).toUpperCase() + s.slice(1); }

    /* form submit */
    form.addEventListener('submit', async (ev) => {
      ev.preventDefault();
      const hp = document.getElementById('hp');
      if(hp && hp.value.trim() !== '') return; // honeypot

      const data = {
        id: Date.now().toString(36),
        name: form.name.value.trim(),
        email: form.email.value.trim(),
        paket: form.paket.value,
        message: form.message.value.trim(),
        createdAt: new Date().toISOString()
      };

      if(!data.name || !data.message){
        alert('Mohon isi nama dan pesan.');
        return;
      }

      // save local
      entries.push(data);
      save();
      render(searchInput.value.trim());
      form.reset();
      form.name.focus();

      // optional: send to server (if enabled)
      if(SEND_TO_SERVER){
        try {
          let res;
          if(SERVER_EXPECTS_JSON){
            res = await fetch(SERVER_URL, {
              method:'POST',
              headers:{'Content-Type':'application/json'},
              body: JSON.stringify({ name:data.name, email:data.email, paket:data.paket, message:data.message }),
              credentials: 'include'
            });
          } else {
            const params = new URLSearchParams();
            params.append('name', data.name);
            params.append('email', data.email);
            params.append('paket', data.paket);
            params.append('message', data.message);
            res = await fetch(SERVER_URL, {
              method:'POST',
              headers:{'Content-Type':'application/x-www-form-urlencoded'},
              body: params.toString(),
              credentials: 'include'
            });
          }
          if(!res.ok) console.warn('Server menolak request:', res.status);
        } catch(err){
          console.error('Gagal kirim ke server:', err);
        }
      }
    });

    /* search */
    searchInput.addEventListener('input', () => render(searchInput.value.trim()));

    /* clear all */
    document.getElementById('clearAll').addEventListener('click', () => {
      if(entries.length === 0){ alert('Tidak ada entri.'); return; }
      if(!confirm('Hapus semua entri?')) return;
      entries = [];
      save();
      render();
    });

    /* export csv */
    document.getElementById('exportCsv').addEventListener('click', downloadCSV);
    function downloadCSV(){
      if(entries.length === 0){ alert('Tidak ada data untuk diekspor.'); return; }
      const header = ['id','name','email','paket','message','createdAt'];
      const rows = entries.map(e => header.map(h => escapeCsv(e[h]||'')).join(','));
      const csv = [header.join(','), ...rows].join('\n');
      const blob = new Blob([csv], {type:'text/csv;charset=utf-8;'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a'); a.href = url; a.download = 'buku-tamu-' + new Date().toISOString().slice(0,10) + '.csv'; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
    }

    function escapeCsv(s){
      if(s == null) return '';
      const out = String(s).replaceAll('"','""');
      return /[",\n]/.test(out) ? `"${out}"` : out;
    }

    /* initial render */
    render();
    console.log('Landing Buku Tamu siap — entries:', entries.length);
  </script>
</body>
</html>
