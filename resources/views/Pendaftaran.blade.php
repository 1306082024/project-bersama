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
    /* CSS as is — tidak diubah */
    :root{
      --bg:#f6fbff;
      --card:#ffffff;
      --muted:#6b7280;
      --primary:#0b6fd6;
      --accent:#1190ff;
      --accent-2:#06a6ff;
      --radius:12px;
      --max-width:1100px;
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
      width: 100%;
      min-height: 200px;
      display:flex;
      gap:20px;
      align-items:center;
      justify-content: space-between;
      background:linear-gradient(90deg,#fff,#fbfdff);
      padding:24px;
      border-radius:16px;
      box-shadow:var(--shadow);
      border:1px solid rgba(7,19,37,0.04);
    }
    .brand{
      display:flex;gap:14px;align-items:center
    }
    .logo{
      width:80px;height:80px;border-radius:12px;display:flex;align-items:center;justify-content:center;
      color:#fff;font-weight:800;font-size:28px;box-shadow:0 10px 30px rgba(11,111,214,0.12);
      flex-shrink:0;overflow:hidden;
    }
    .logo img{
      width:100%;height:100%;object-fit:contain;display:block;
    }
    .hero-left, .hero-right{
      flex:1
    }
    .kicker{
      color:var(--primary);font-weight:700;font-size:13px
    }
    .hero-title{
      font-size:26px;margin:6px 0 6px;color:#042244;line-height:1.05
    }
    .hero-sub{
      color:var(--muted);margin:0;font-size:14px
    }

    .hero-cta{
      display:flex;gap:12px;margin-top:12px
    }
    .btn{
      padding:10px 14px;border-radius:10px;font-weight:700;border:0;cursor:pointer
    }
    .btn-primary{
      background:linear-gradient(90deg,var(--primary),var(--accent-2));
      color:#fff;
      box-shadow:0 10px 24px rgba(11,111,214,0.12)
    }
    .btn-ghost{
      background:#fff;
      border:1px solid rgba(7,19,37,0.06);
      color:var(--primary)
    }

    .hero-right, .hero-card{
      width: 100%;
      max-width: 260px;
      margin-left: auto;
    }

    .grid{
      display:grid;
      grid-template-columns: 420px minmax(420px, 1fr) 320px;
      gap:20px;
      align-items:start;
    }
    .card{background:var(--card);padding:16px;border-radius:12px;box-shadow:var(--shadow);border:1px solid rgba(7,19,37,0.04)}

    h2,h3{margin:0 0 8px}

    label{display:block;font-size:13px;color:var(--muted);margin-bottom:6px}
    input[type="text"], input[type="email"], input[type="number"], textarea, select{
      width:100%;padding:10px 12px;border-radius:10px;border:1px solid rgba(7,19,37,0.06);
      background:#fff;font-size:14px;color:inherit;outline:none;
    }
    textarea{min-height:120px;resize:vertical;padding:10px 12px}
    .form-actions{display:flex;gap:10px;margin-top:12px;flex-wrap:wrap}

    .small{font-size:13px;color:var(--muted)}
    .hidden{display:none}

    #packages{
      display:flex;
      flex-wrap:wrap;
      column-gap:20px;   
      row-gap:20px;      
      margin-top:10px;
    }

    .pkg{
      background:#ffffff;
      border-radius:12px;
      padding:14px 16px;
      box-shadow:var(--shadow);
      border:1px solid rgba(7,19,37,0.06);
      box-sizing:border-box;
    }

    .premium-footer {
      margin-bottom: 120px;   
      padding-bottom: 40px;
      display: block;
      overflow: visible !important;
    }
    #slide-2 {
      overflow: visible !important;
    }
    #slide-3 {
      overflow: visible !important;
    }

    /* =============================== */
/*      ANIMASI RESPONSIVE         */
/* =============================== */

@keyframes fadeUp {
  0% {
    opacity: 0;
    transform: translateY(18px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeScale {
  0% {
    opacity: 0;
    transform: scale(.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

.slide {
  animation: fadeUp .45s ease-out;
}

.pkg {
  animation: fadeScale .4s ease-out;
}

.premium-footer {
  animation: fadeUp .8s ease-out;
}

@media (max-width: 1024px) {
  .hero {
    padding: 20px;
    gap: 18px;
  }

  .hero-title {
    font-size: 24px;
  }

  .hero-sub {
    font-size: 13px;
  }

  .logo {
    width: 70px;
    height: 70px;
  }
}

@media (max-width: 820px) {
  .hero {
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    min-height: auto;       
    padding: 20px;
  }

  .hero-right {
    display: none;
  }

  .hero-title {
    font-size: 22px;
  }

  .logo {
    width: 64px;
    height: 64px;
  }
}

@media (max-width: 500px) {
  .hero {
    padding: 16px;
  }

  .hero-title {
    font-size: 20px;
    line-height: 1.2;
  }

  .hero-sub {
    font-size: 12px;
  }

  .logo {
    width: 58px;
    height: 58px;
  }

  .hero-cta button {
    width: 100%; 
    text-align: center;
  }
}

  </style>
<link rel="icon" type="image/png" href="{{ asset('storage/gambar/favicon-gintara.png') }}">
</head>
<body>
<main class="shell" id="app">

<!-- HERO -->
<section class="hero">
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

<!-- SLIDES -->
<section class="card" style="margin-top:6px">
<div id="slides">

<!-- SLIDE 1 -->
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

<!-- SLIDE 2 -->
<div class="slide hidden" id="slide-2">
  <h2>Pilihan Paket</h2>
  <p class="small">Harga mengikuti wilayah yang Anda pilih.</p>

  <div id="packages"></div>

  <div style="margin-top:12px">
    <button class="btn btn-ghost" onclick="goToSlide(1)">Kembali</button>
  </div>
</div>

<!-- SLIDE 3 -->
<div class="slide hidden" id="slide-3">
  <h2>Pendaftaran</h2>
  <h3>DATA PEMOHON</h3>

  <form id="guestForm" autocomplete="off" novalidate>

    <input type="hidden" id="selected_wilayah" name="wilayah_id" />
    <input type="hidden" id="selected_paket" name="paket_id" />

    <label>Nama *</label>
    <input id="nama" name="nama" type="text" required>

    <label style="margin-top:10px">NIK *</label>
    <input id="nik" name="nik" type="number" required>

    <label style="margin-top:10px">Tempat, Tanggal Lahir *</label>
    <input id="ttl" name="ttl" type="text" required>

    <label style="margin-top:10px">No. HP (Whatsapp) *</label>
    <input id="kontak" name="kontak" type="text" required>

    <label style="margin-top:10px">Email *</label>
    <input id="email" name="email" type="email">

    <label style="margin-top:10px">Alamat *</label>
    <textarea id="alamat_jalan" name="alamat_jalan" required></textarea>

    <div style="display:flex;gap:8px;margin-top:8px">
      <div style="flex:1">
        <label>RT</label>
        <input id="rt" name="rt" type="text">
      </div>
      <div style="flex:1">
        <label>RW</label>
        <input id="rw" name="rw" type="text">
      </div>
      <div style="flex:1">
        <label>No. Rumah</label>
        <input id="no_rumah" name="no_rumah" type="text">
      </div>
    </div>

    <div style="display:flex;gap:8px;margin-top:8px">
      <div style="flex:1">
        <label>Desa/Kelurahan</label>
        <input id="desa" name="desa" type="text">
      </div>
      <div style="flex:1">
        <label>Kecamatan</label>
        <input id="kecamatan" name="kecamatan" type="text">
      </div>
      <div style="flex:1">
        <label>Kabupaten</label>
        <input id="kabupaten" name="kabupaten" type="text">
      </div>
    </div>

    <label style="margin-top:10px">Pesan / Catatan *</label>
    <textarea id="pesan" name="pesan" required></textarea>

    <div class="form-actions">
      <button type="button" class="btn btn-ghost" onclick="setLocation()">Set Lokasi</button>
      <button type="submit" class="btn btn-primary">Kirim Formulir</button>
    </div>

    <div id="locStatus" class="small hint" style="margin-top:8px"></div>

  </form>
</div>

</div>
</section>

</form>

<div class="premium-footer">
  <section style="
  margin-top:30px;
  background:linear-gradient(135deg,#0b3b80,#0b5fd6);
  padding:48px 32px;
  border-radius:28px;
  color:#fff;
  box-shadow:0 10px 40px rgba(0,0,0,0.14);
  position:relative;
">

  <!-- Background Grid Pattern -->
  <div style="
    position:absolute;
    inset:0;
    background:url('https://i.ibb.co/0Jm2dBL/grid-2.png');
    opacity:.15;
    pointer-events:none;
  "></div>

  <h2 style="
    text-align:center;
    font-size:28px;
    margin-bottom:38px;
    font-weight:700;
    position:relative;
    z-index:2">
    Kenapa Harus Pilih Gintara.Net
  </h2>

  <div style="
    position:relative;z-index:2;
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap:34px;
  ">

    <!-- Fitur 1 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;
        background:white;display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
      ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <path d="M5 12C5 10.3431 6.34315 9 8 9C10.2091 9 12 12 12 12C12 12 13.7909 9 16 9C17.6569 9 19 10.3431 19 12C19 13.6569 17.6569 15 16 15C13.7909 15 12 12 12 12C12 12 10.2091 15 8 15C6.34315 15 5 13.6569 5 12Z"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Internet Unlimited</div>
        <div style="font-size:13px;opacity:.85">Tanpa FUP, stabil setiap hari.</div>
      </div>
    </div>

    <!-- Fitur 2 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;background:white;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
        ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <path d="M12 2V6"/>
          <path d="M12 18V22"/>
          <path d="M2 12H6"/>
          <path d="M18 12H22"/>
          <path d="M4.93 4.93L7.76 7.76"/>
          <path d="M16.24 16.24L19.07 19.07"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Gratis Instalasi</div>
        <div style="font-size:13px;opacity:.85">Tanpa biaya pemasangan.</div>
      </div>
    </div>
    
    <!-- Fitur 3 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;background:white;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
      ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <path d="M3 15h13a4 4 0 0 0 0-8 5 5 0 0 0-9.7-1.3A4 4 0 0 0 3 15z"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Anti Cuaca</div>
        <div style="font-size:13px;opacity:.85">Jaringan stable saat hujan.</div>
      </div>
    </div>

    <!-- Fitur 4 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;background:white;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
        ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <path d="M12 3v12"/>
          <path d="M8 7l4-4 4 4"/>
          <path d="M12 21V9"/>
          <path d="M8 17l4 4 4-4"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Upload & Download Simetris</div>
        <div style="font-size:13px;opacity:.85">1:1 untuk CCTV & kerja remote.</div>
      </div>
    </div>

    <!-- Fitur 5 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;background:white;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
      ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <circle cx="12" cy="12" r="10"/>
          <path d="M12 6v6l4 2"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Low Latency</div>
        <div style="font-size:13px;opacity:.85">Tidak lag untuk game & Zoom.</div>
      </div>
    </div>

    <!-- Fitur 6 -->
    <div style="display:flex;gap:16px;align-items:flex-start">
      <div style="
        width:54px;height:54px;border-radius:14px;background:white;
        display:flex;align-items:center;justify-content:center;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
        ">
        <svg width="28" height="28" viewBox="0 0 24 24" stroke="#0b5fd6" fill="none" stroke-width="2">
          <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 2 3.08 2 2 0 0 1 3.18 1h3a2 2 0 0 1 2 1.72 12.7 12.7 0 0 0 .7 2.81A2 2 0 0 1 7.27 6l-1.3 1.3a16 16 0 0 0 6.9 6.9l1.3-1.3a2 2 0 0 1 1.72-.5 12.7 12.7 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
      </div>
      <div>
        <div style="font-size:18px;font-weight:700">Layanan 24/7</div>
        <div style="font-size:13px;opacity:.85">Chat & Call setiap hari.</div>
      </div>
    </div>

  </div>
</section>

</div>
</div>


</main>

<script>
  const apiBase = '/api';
let selectedWilayah = null;
let selectedPaket = null;

function goToSlide(n){
  document.querySelectorAll('.slide').forEach(x => x.classList.add('hidden'));
  document.getElementById('slide-'+n).classList.remove('hidden');
  if(n === 2) loadPaket();
}

async function loadWilayah(){
  const sel = document.getElementById('wilayahSelect');
  try{
    const r = await fetch('/api/wilayah');
    const data = await r.json();

    sel.innerHTML = '<option value="">— Pilih wilayah —</option>';
    data.forEach(w=>{
      const o = document.createElement('option');
      o.value = w.id;
      o.textContent = w.nama;
      sel.appendChild(o);
    });
    sel.onchange = () =>{
      selectedWilayah = sel.value;
      document.getElementById('selected_wilayah').value = sel.value;
    };
  }catch(e){
    sel.innerHTML = '<option>Gagal memuat wilayah</option>';
  }
}

async function loadPaket(){
  try{
    const r = await fetch(apiBase + '/paket/wilayah/' + (selectedWilayah || 0));
    const data = await r.json();
    const c = document.getElementById('packages');
    c.innerHTML = '';

    data.forEach(p=>{
      const div = document.createElement('div');
      div.className = 'pkg';
      div.style.minWidth = '220px';
      div.innerHTML = `
        <div style="font-weight:700">${p.nama} — Rp ${Number(p.harga).toLocaleString('id-ID')}</div>
        <div style="font-size:13px;margin-top:6px">${p.deskripsi || ''}</div>
        <div style="margin-top:8px">
          <button class="btn btn-primary" type="button" onclick="pickPaket(${p.id}, '${p.nama.replace(/'/g,"\\'")}')">Berlangganan</button>
        </div>
      `;
      c.appendChild(div);
    });
  }catch(e){
    document.getElementById('packages').innerHTML = '<div class="small">Gagal memuat paket</div>';
  }
}

function pickPaket(id, nama){
  selectedPaket = id;
  document.getElementById('selected_paket').value = id;
  alert("Paket dipilih: " + nama);
  goToSlide(3);
}

function setLocation(){
  const status = document.getElementById('locStatus');
  if(!navigator.geolocation){
    status.textContent = 'Geolocation tidak tersedia';
    return;
  }
  status.textContent = 'Mengambil lokasi...';
  navigator.geolocation.getCurrentPosition(pos=>{
    const s = pos.coords.latitude + ',' + pos.coords.longitude;
    document.getElementById('guestForm').dataset.lokasi = s;
    status.textContent = 'Lokasi diset: ' + s;
  },err=>{
    status.textContent = 'Gagal mengambil lokasi: ' + err.message;
  });
}

function buildFullAddress(){
  const jalan = document.getElementById('alamat_jalan').value;
  const rt = document.getElementById('rt').value;
  const rw = document.getElementById('rw').value;
  const no = document.getElementById('no_rumah').value;
  const desa = document.getElementById('desa').value;
  const kec = document.getElementById('kecamatan').value;
  const kab = document.getElementById('kabupaten').value;

  const parts = [];
  if(jalan) parts.push(jalan);
  if(no) parts.push("No. "+no);
  if(rt || rw) parts.push("RT "+rt+" / RW "+rw);
  if(desa) parts.push("Desa "+desa);
  if(kec) parts.push("Kec. "+kec);
  if(kab) parts.push("Kab. "+kab);
  return parts.join(', ');
}

document.addEventListener('DOMContentLoaded', ()=>{
  loadWilayah();
  goToSlide(1);

  const form = document.getElementById('guestForm');
  form.addEventListener('submit', async(e)=>{
    e.preventDefault();

    const payload = {
      nama: document.getElementById('nama').value,
      nik: document.getElementById('nik').value,
      ttl: document.getElementById('ttl').value,
      kontak: document.getElementById('kontak').value,
      email: document.getElementById('email').value,
      wilayah_id: document.getElementById('selected_wilayah').value,
      paket_id: document.getElementById('selected_paket').value,

      alamat_jalan: document.getElementById('alamat_jalan').value,
      rt: document.getElementById('rt').value,
      rw: document.getElementById('rw').value,
      no_rumah: document.getElementById('no_rumah').value,
      desa: document.getElementById('desa').value,
      kecamatan: document.getElementById('kecamatan').value,
      kabupaten: document.getElementById('kabupaten').value,

      full_alamat: buildFullAddress(),
      pesan: document.getElementById('pesan').value,
      lokasi: form.dataset.lokasi || null,
    };

    try{
      const r = await fetch(apiBase+'/tamu',{
        method:'POST',
        headers:{
          'Content-Type':'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body:JSON.stringify(payload)
      });

      if(r.ok){
        alert("Terima kasih! Form berhasil dikirim.");
        form.reset();
        form.dataset.lokasi = "";
        goToSlide(1);
      } else {
        alert("Gagal mengirim data.");
      }
    }catch(err){
      alert("Koneksi gagal.");
    }
  });
});
</script>

</body>
</html>
