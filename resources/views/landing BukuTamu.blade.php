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
    .hero-card .label{font-weight:700;color:var(--primary);font-size:14px}

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

          <label for="email" style="margin-top:10px">Email / WhatsApp</label>
          <input id="email" name="email" type="text" placeholder="0812xxx / contoh@gmail.com" />

          <label for="paket" style="margin-top:10px">Paket yang diminati</label>
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
          </div>

        </form>
      </aside>

      <!-- CENTER: FAQ -->
      <article class="card" aria-labelledby="summary-title">
        <h3 id="summary-title">FAQ</h3>
        <div style="margin-top:10px" class="small">
          <strong>Berapa lama pemasangan?</strong>
          <div>Rata-rata 1–3 hari kerja setelah konfirmasi.</div>

          <strong style="margin-top:8px; display:block;">Apakah ada biaya pemasangan?</strong>
          <div>Biasanya ada biaya awal—cek promo untuk gratis pemasangan.</div>
        </div>
      </article>

      <!-- RIGHT: Kenapa pilih Gintara -->
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
    // form demo (tetap seperti semula)
    document.getElementById('guestForm').addEventListener('submit', function(e){
      e.preventDefault();
      alert('Terima kasih! Pesan Anda terkirim (demo).');
      this.reset();
    });
  </script>
</body>
</html>
