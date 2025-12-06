<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Pendaftaran Gintara</title>
  <meta name="description" content="Landing page Pendaftaran Gintara — paket Internet Rumah (Hemat, Puas, Mantap)." />
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
      --max-width:1100px; /* dikurangi agar area kosong berkurang */
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
      padding:24px; /* dikurangi sedikit */
      border-radius:16px;
      box-shadow:var(--shadow);
      border:1px solid rgba(7,19,37,0.04);
    }
    .brand{
      display:flex;gap:14px;align-items:center;
    }
    .logo{
      width:80px;height:80px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:28px;box-shadow:0 10px 30px rgba(11,111,214,0.12);
      flex-shrink:0;
      overflow:hidden;
    }
    .logo img{
      width:100%;
      height:100%;
      object-fit:contain;
      display:block;
    }
    .hero-left{flex:1}
    .kicker{color:var(--primary);font-weight:700;font-size:13px}
    .hero-title{font-size:26px;margin:6px 0 6px;color:#042244;line-height:1.05} /* sedikit lebih ringkas */
    .hero-sub{color:var(--muted);margin:0;font-size:14px}

    .hero-cta{display:flex;gap:12px;margin-top:12px}
    .btn{
      padding:10px 14px;border-radius:10px;font-weight:700;border:0;cursor:pointer;
    }
    .btn-primary{background:linear-gradient(90deg,var(--primary),var(--accent-2));color:#fff;box-shadow:0 10px 24px rgba(11,111,214,0.12)}
    .btn-ghost{background:#fff;border:1px solid rgba(7,19,37,0.06);color:var(--primary)}

    .hero-right{
      min-width:220px;text-align:right;
    }
    .hero-card{
      background:#fff;padding:12px;border-radius:10px;border:1px solid rgba(7,19,37,0.04)
    }

    .grid{
      display:grid;
      grid-template-columns: 420px minmax(420px, 1fr) 320px; /* batasi kolom tengah supaya tidak terlalu lebar */
      gap:20px;
      align-items:start;
    }
    .card{
      background:var(--card);
      padding:16px;border-radius:12px;box-shadow:var(--shadow);border:1px solid rgba(7,19,37,0.04);
    }
    h2,h3{margin:0 0 8px}

    label{display:block;font-size:13px;color:var(--muted);margin-bottom:6px}
    input[type="text"], input[type="email"], textarea, select, .search{
      width:100%;padding:10px 12px;border-radius:10px;border:1px solid rgba(7,19,37,0.06);background:#fff;font-size:14px;color:inherit;outline:none;
    }
    textarea{min-height:120px;resize:vertical;padding:10px 12px}
    .form-actions{display:flex;gap:10px;margin-top:12px;flex-wrap:wrap}
    .hint{font-size:13px;color:var(--muted);margin-top:8px}

    .packages{display:flex;gap:8px;flex-wrap:wrap;margin-top:12px}
    .pkg{padding:8px 10px;border-radius:10px;background:#f1f8ff;border:1px solid rgba(11,111,214,0.06);color:var(--primary);font-weight:700}

    .table{
      width:100%;
      border-collapse:collapse;
      background:#fff;border-radius:10px;overflow:hidden;border:1px solid rgba(7,19,37,0.04);
    }
    .table th, .table td{padding:10px 12px;border-bottom:1px solid rgba(7,19,37,0.04);text-align:left;font-size:14px}
    .table thead th{background:#f1f7ff;color:#042244}
    .table tbody tr:hover{background:#fbfdff}
    .small{font-size:13px;color:var(--muted)}

    .list{display:flex;flex-direction:column;gap:12px;max-height:56vh;overflow:auto;padding-right:6px}
    .entry{display:flex;gap:12px;align-items:flex-start;padding:12px;border-radius:10px;border:1px solid rgba(7,19,37,0.04);background:#fff}
    .avatar{width:48px;height:48px;border-radius:10px;background:linear-gradient(135deg,var(--primary),var(--accent-2));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:16px;flex-shrink:0}
    .controls{display:flex;gap:8px}
    .small-btn{padding:6px 8px;border-radius:8px;border:1px solid rgba(7,19,37,0.06);background:#fff;cursor:pointer;color:var(--muted);font-weight:600}

    @media (max-width:1100px){
      .grid{grid-template-columns: 1fr 320px}
      .hero-right{display:none}
    }
    @media (max-width:820px){
      body{
        padding:16px;
      }

      .hero{
        flex-direction:column;
        align-items:flex-start;
        padding:18px;
        gap:14px;
      }

      .hero-title{
        font-size:22px;
      }

      .hero-sub{
        font-size:13px;
      }

      .logo{
        width:70px;
        height:70px;
      }

      .grid{
        display:flex;
        flex-direction:column;
        gap:16px;
      }

      .card{
        padding:14px;
      }

      input[type="text"], input[type="email"], textarea, select{
        font-size:14px;
        padding:10px;
      }

      textarea{
        min-height:110px;
      }

      h2, h3{
        font-size:18px;
      }

      .packages{
        gap:6px;
      }

      .pkg{
        padding:6px 8px;
        font-size:12px;
      }
    }
    .hidden{display:none}
    .u-right{text-align:right}
  </style>
</head>
<body>
  <main class="shell" id="app">
    <section class="hero" aria-label="Hero">
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
          <button class="btn btn-primary" onclick="goToSlide(1)">Isi Sekarang</button>
          <button class="btn btn-ghost" onclick="goToSlide(2)">Lihat Paket</button>
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

    <section class="card" aria-label="Slides utama" style="margin-top:6px">
      <div id="slides">
        <div class="slide" id="slide-1">
          <h2>Area yang telah dicover</h2>
          <p class="small">Pilih area untuk melihat paket yang tersedia.</p>
          <label for="wilayahSelect">Wilayah</label>
          <select id="wilayahSelect">
            <option value="">— Memuat wilayah —</option>
          </select>
          <div style="margin-top:12px">
            <button class="btn btn-primary" onclick="goToSlide(2)">Lanjut ke Pilihan Paket</button>
          </div>
        </div>

        <div class="slide hidden" id="slide-2">
          <h2>Pilihan Paket</h2>
          <p class="small">Harga mengikuti wilayah yang Anda pilih.</p>
          <div id="packages" style="display:flex;gap:12px;flex-wrap:wrap;margin-top:10px"></div>
          <div style="margin-top:12px">
            <button class="btn btn-ghost" onclick="goToSlide(1)">Kembali</button>
          </div>
        </div>

        <div class="slide hidden" id="slide-3">
          <h2>Pendaftaran</h2>
          <p class="small">Isi data singkat — No. HP dan Pesan wajib diisi.</p>

          <form id="guestForm" autocomplete="off" novalidate>
            <input type="hidden" id="selected_wilayah" name="wilayah_id" />
            <input type="hidden" id="selected_paket" name="paket_id" />

            <label for="name">Nama <span style="color:var(--primary)">*</span></label>
            <input id="name" name="name" type="text" placeholder="Nama lengkap" required />

            <label for="contact" style="margin-top:10px">Kontak (WA / Email)</label>
            <input id="contact" name="contact" type="text" placeholder="0812xxx / contoh@gmail.com" />

            <label for="message" style="margin-top:10px">Pesan / Keterangan <span style="color:var(--primary)">*</span></label>
            <textarea id="message" name="message" placeholder="Contoh: saya ingin pasang paket Mantap..." required></textarea>

            <div class="form-actions">
              <button type="button" class="btn btn-ghost" onclick="setLocation()">Set Lokasi</button>
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </div>

            <div id="locStatus" class="small hint" style="margin-top:8px"></div>
          </form>
        </div>
      </div>
    </section>

    <section class="grid" aria-label="Konten Utama">
      <aside class="card" aria-labelledby="form-title">
        <h2 id="form-title">Ringkasan</h2>
        <p class="small">Gunakan slide di atas untuk memilih wilayah → paket → isi formulir. Tombol "Set Lokasi" akan mencoba mendapatkan koordinat Anda.</p>
        <div style="margin-top:12px">
          <div class="packages" aria-hidden="false">
            <div class="pkg">Unlimited</div>
          </div>
        </div>
      </aside>

      <article class="card" aria-labelledby="summary-title">
        <h3 id="summary-title">FAQ</h3>
        <div style="margin-top:10px" class="small">
          <strong>Berapa lama pemasangan?</strong>
          <div>Rata-rata 1–3 hari kerja setelah konfirmasi.</div>

          <strong style="margin-top:8px; display:block;">Apakah ada biaya pemasangan?</strong>
          <div>tidak ada, Biaya pemasangan & instalasi GRATIS!</div>
        </div>
      </article>

      <aside class="card" aria-labelledby="list-title">
        <div style="display:flex;gap:8px;align-items:center;margin-bottom:8px">
          <h3 id="list-title" style="margin:0">Kenapa Pilih Gintara?</h3>
        </div>
        <div style="display:flex;flex-direction:column;gap:12px;margin-top:12px">
          <div style="display:flex;gap:12px;align-items:flex-start">
            <div style="width:12px;height:12px;border-radius:3px;background:var(--primary);margin-top:6px"></div>
            <div>
              <strong>Pasang Cepat</strong>
              <div class="small">Teknisi siap pasang dalam 1–3 hari kerja.</div>
            </div>
          </div>

          <div style="display:flex;gap:12px;align-items:flex-start">
            <div style="width:12px;height:12px;border-radius:3px;background:var(--accent-2);margin-top:6px"></div>
            <div>
              <strong>Unlimited</strong>
              <div class="small">Tanpa kuota, stabil untuk keluarga.</div>
            </div>
          </div>

          <div style="display:flex;gap:12px;align-items:flex-start">
            <div style="width:12px;height:12px;border-radius:3px;background:#22c55e;margin-top:6px"></div>
            <div>
              <strong>Support 24/7</strong>
              <div class="small">Layanan pelanggan siap membantu kapan saja.</div>
            </div>
          </div>
        </div>
      </aside>
    </section>

    <footer style="text-align:center;color:var(--muted);font-size:13px;padding-top:6px">© GINTARA.NET • Layanan Internet Rumah</footer>
  </main>

  <script>
    const apiBase = '/api';
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    let wilayahList = [];
    let selectedWilayah = null;
    let selectedPaket = null;

    function goToSlide(n){
      document.querySelectorAll('.slide').forEach(s=>s.classList.add('hidden'));
      const el = document.getElementById('slide-' + n);
      if(el) el.classList.remove('hidden');
      if(n === 2) loadPaket();
    }

    async function loadWilayah(){
      try {
        const res = await fetch(apiBase + '/wilayah');
        if(!res.ok) throw new Error('Gagal memuat wilayah');
        wilayahList = await res.json();
        const sel = document.getElementById('wilayahSelect');
        sel.innerHTML = '<option value="">— Pilih wilayah —</option>';
        wilayahList.forEach(w => {
          const opt = document.createElement('option');
          opt.value = w.id;
          opt.textContent = w.nama;
          sel.appendChild(opt);
        });
        sel.addEventListener('change', (e) => {
          selectedWilayah = e.target.value ? parseInt(e.target.value) : null;
          document.getElementById('selected_wilayah').value = selectedWilayah || '';
        });
      } catch(err){
        console.error(err);
        const sel = document.getElementById('wilayahSelect');
        if(sel) sel.innerHTML = '<option value="">Gagal memuat wilayah</option>';
      }
    }

    async function loadPaket(){
      try {
        const id = selectedWilayah || 0;
        const res = await fetch(apiBase + '/paket/wilayah/' + id);
        if(!res.ok) throw new Error('Gagal memuat paket');
        const data = await res.json();
        const container = document.getElementById('packages');
        container.innerHTML = '';
        if(data.length === 0){
          container.innerHTML = '<div class="small">Tidak ada paket untuk wilayah ini.</div>';
          return;
        }
        data.forEach(p => {
          const div = document.createElement('div');
          div.className = 'pkg';
          div.style.minWidth = '220px';
          div.innerHTML = `
            <div style="font-weight:700">${p.nama} — Rp ${Number(p.harga).toLocaleString('id-ID')}</div>
            <div style="font-size:13px;margin-top:6px">${p.deskripsi || ''}</div>
            <div style="margin-top:8px">
              <button class="btn btn-primary" type="button" onclick="pickPaket(${p.id}, '${(p.nama+'').replace(/'/g,'\\\'')}')">Berlangganan</button>
            </div>`;
          container.appendChild(div);
        });
      } catch(err){
        console.error(err);
        const container = document.getElementById('packages');
        if(container) container.innerHTML = '<div class="small">Gagal memuat paket.</div>';
      }
    }

    function pickPaket(id, nama){
      selectedPaket = id;
      document.getElementById('selected_paket').value = id;
      alert('Paket dipilih: ' + nama);
      goToSlide(3);
    }

    function setLocation(){
      const status = document.getElementById('locStatus');
      if(!navigator.geolocation){
        status.textContent = 'Geolocation tidak tersedia di perangkat ini.';
        return;
      }
      status.textContent = 'Mencoba mendapatkan lokasi…';
      navigator.geolocation.getCurrentPosition(pos=>{
        const s = pos.coords.latitude + ',' + pos.coords.longitude;
        const form = document.getElementById('guestForm');
        if(form) form.dataset.lokasi = s;
        status.textContent = 'Lokasi diset: ' + s;
      }, err=>{
        status.textContent = 'Gagal mendapatkan lokasi: ' + err.message;
      }, {enableHighAccuracy:true, timeout:10000});
    }

    document.addEventListener('DOMContentLoaded', function(){
      loadWilayah();
      goToSlide(1);

      const form = document.getElementById('guestForm');
      if(form){
        form.addEventListener('submit', async function(e){
          e.preventDefault();
          const payload = {
            nama: document.getElementById('name').value,
            kontak: document.getElementById('contact').value,
            wilayah_id: document.getElementById('selected_wilayah').value || null,
            paket_id: document.getElementById('selected_paket').value || null,
            pesan: document.getElementById('message').value,
            lokasi: this.dataset.lokasi || null
          };

          try {
            const res = await fetch(apiBase + '/tamu', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
              },
              body: JSON.stringify(payload)
            });

            if(res.status === 201 || res.ok){
              alert('Terima kasih! Pesan Anda terkirim.');
              this.reset();
              this.dataset.lokasi = '';
              document.getElementById('selected_wilayah').value = '';
              document.getElementById('selected_paket').value = '';
              selectedWilayah = null;
              selectedPaket = null;
              goToSlide(1);
            } else if(res.status === 422){
              const data = await res.json();
              let pesan = 'Validasi gagal:\n';
              if(data.errors){
                for(const k in data.errors){
                  pesan += data.errors[k].join(', ') + '\n';
                }
              }
              alert(pesan);
            } else {
              const txt = await res.text();
              console.error(txt);
              alert('Terjadi kesalahan saat mengirim.');
            }
          } catch(err){
            console.error(err);
            alert('Gagal mengirim — periksa koneksi.');
          }
        });
      }
    });
  </script>
</body>
</html>
