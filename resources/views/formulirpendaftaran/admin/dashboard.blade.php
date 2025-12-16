<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gintara Admin Dashboard</title>

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
  --shadow:0 4px 6px -1px rgba(0,0,0,.05),0 2px 4px -1px rgba(0,0,0,.03)
}
*{box-sizing:border-box}
body{margin:0;font-family:Inter;background:var(--bg-body);display:flex;min-height:100vh;color:var(--text-main)}

.sidebar{
  width:var(--sidebar-width);
  background:#fff;
  border-right:1px solid var(--border);
  position:fixed;height:100%;top:0;left:0
}
.nav{padding:20px 16px}
.nav-item{
  display:flex;align-items:center;
  padding:12px;border-radius:8px;
  color:var(--text-muted);
  text-decoration:none;
  margin-bottom:4px;font-size:14px
}
.nav-item.active{background:var(--primary);color:#fff}
.nav-icon{margin-right:12px;width:20px;text-align:center}
.nav-label{font-size:11px;text-transform:uppercase;color:#9ca3af;margin:20px 0 8px 12px}

.main{margin-left:var(--sidebar-width);flex:1;padding:30px;max-width:100%}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px}
.avatar{
  width:40px;height:40px;border-radius:50%;
  background:#e0e7ff;color:var(--primary);
  display:flex;align-items:center;justify-content:center;font-weight:700
}

.grid-stats{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
  gap:20px;margin-bottom:30px
}
.card{
  background:#fff;border-radius:12px;
  padding:20px;border:1px solid var(--border);
  box-shadow:var(--shadow)
}
.stat-head{display:flex;justify-content:space-between;margin-bottom:12px}
.stat-title{font-size:13px;color:#6b7280}
.stat-value{font-size:28px;font-weight:700}
.stat-desc{font-size:12px;margin-top:6px}
.text-up{color:var(--success)}
.text-down{color:var(--danger)}

.grid-charts{
  display:grid;
  grid-template-columns:2fr 1fr;
  gap:20px;margin-bottom:30px
}

.bar-chart{
  display:flex;
  justify-content:space-between;
  align-items:flex-end;
  height:240px;
  gap:14px;
  margin-top:20px
}
.bar-group{text-align:center;flex:1}

.donut-chart{
  width:160px;height:160px;
  border-radius:50%;
  position:relative;
  margin:auto
}
.donut-inner{
  position:absolute;
  width:120px;height:120px;
  background:#fff;border-radius:50%;
  top:20px;left:20px;
  display:flex;flex-direction:column;
  align-items:center;justify-content:center
}

table{width:100%;border-collapse:collapse}
th,td{padding:14px;border-bottom:1px solid var(--border);font-size:14px}
th{background:#f9fafb;color:#6b7280}
.badge{padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600}
.badge-yellow{background:#fef3c7;color:#b45309}
.badge-green{background:#dcfce7;color:#15803d}
.badge-blue{background:#e0f2fe;color:#0369a1}
.badge-red{background:#fee2e2;color:#dc2626}
</style>
</head>

<body>

<aside class="sidebar">
    <nav class="nav">
      <a href="tes" class="nav-item active">
        <span class="nav-icon">📊</span> Dashboard
      </a>
      <a href="data-pendaftar" class="nav-item">
        <span class="nav-icon">📝</span> Data Pendaftar
      </a>
      <a href="pelanggan" class="nav-item">
        <span class="nav-icon">👥</span> Data Pelanggan
      </a>
      <a href="wilayah1" class="nav-item">
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
    <h1>Dashboard</h1>
    <p style="color:#6b7280">Halo Admin, berikut update hari ini.</p>
  </div>
  <div style="display:flex;align-items:center;gap:12px">
    <div style="text-align:right">
      <div style="font-weight:600">Administrator</div>
      <div style="font-size:12px;color:#6b7280">Admin</div>
    </div>
    <div class="avatar">A</div>
  </div>
</header>

<!-- STAT -->
<div class="grid-stats">
  <div class="card">
    <div class="stat-head">
      <div class="stat-title">TOTAL PENDAFTAR</div>
      <i class="fa-solid fa-file-signature"></i>
    </div>
    <div class="stat-value" id="totalPendaftar">0</div>
    <div class="stat-desc" id="persenTotal"></div>
  </div>

  <div class="card">
    <div class="stat-head">
      <div class="stat-title">MENUNGGU INSTALASI</div>
      <i class="fa-solid fa-screwdriver-wrench"></i>
    </div>
    <div class="stat-value" id="menungguInstalasi">0</div>
    <div class="stat-desc">Jadwal minggu ini</div>
  </div>

  <div class="card">
    <div class="stat-head">
      <div class="stat-title">PELANGGAN AKTIF</div>
      <i class="fa-solid fa-circle-check"></i>
    </div>
    <div class="stat-value" id="pelangganAktif">0</div>
    <div class="stat-desc" id="persenAktif"></div>
  </div>

  <div class="card">
    <div class="stat-head">
      <div class="stat-title">TIKET KENDALA</div>
      <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
    <div class="stat-value">3</div>
    <div class="stat-desc text-down">▼ Turun (Kinerja Bagus)</div>
  </div>
</div>

<div class="grid-charts">
  <div class="card">
    <h3>Statistik Pendaftaran (Mingguan)</h3>
    <div class="bar-chart" id="barChart"></div>
  </div>

  <div class="card">
    <h3>Sebaran Paket</h3>
    <div class="donut-chart">
      <div class="donut-inner">
        <span style="font-size:24px;font-weight:700" id="donutTotal">0</span>
        <span style="font-size:12px;color:#6b7280">Total</span>
      </div>
    </div>
    <div id="paketLegend" style="margin-top:16px;font-size:13px"></div>
  </div>
</div>

<!-- FULL WIDTH TABLE -->
<div class="card">
  <h3>Pendaftaran Terbaru</h3>
  <table>
    <thead>
      <tr>
        <th>ID</th><th>Nama</th><th>Wilayah</th>
        <th>Paket</th><th>Tanggal</th><th>Status</th>
      </tr>
    </thead>
    <tbody id="tamuTable"></tbody>
  </table>
</div>

</main>

<script>
const API='http://localhost:8000/api';

const warnaPaket={
  'Paket Hemat':'#93c5fd',
  'Paket Puas':'#3b82f6',
  'Paket Mantap':'#0b6fd6',
  'Paket Ganas':'#ef4444',
  'Paket Sultan':'#7c3aed'
};

fetch(API+'/admin/tamu')
.then(r=>r.json())
.then(data=>{

const now=new Date();
const thisMonth=now.getMonth();
const lastMonth=thisMonth===0?11:thisMonth-1;
const thisYear=now.getFullYear();
const lastYear=thisMonth===0?thisYear-1:thisYear;

const bulanIni=data.filter(t=>{
  const d=new Date(t.created_at);
  return d.getMonth()===thisMonth&&d.getFullYear()===thisYear;
});
const bulanLalu=data.filter(t=>{
  const d=new Date(t.created_at);
  return d.getMonth()===lastMonth&&d.getFullYear()===lastYear;
});

totalPendaftar.innerText=data.length;

const pct=(a,b)=>b?Math.round(((a-b)/b)*100):0;
const pTotal=pct(bulanIni.length,bulanLalu.length);
persenTotal.innerHTML=`${pTotal>=0?'▲':'▼'} ${Math.abs(pTotal)}% dari bulan lalu`;
persenTotal.className=`stat-desc ${pTotal>=0?'text-up':'text-down'}`;

const aktif=data.filter(t=>t.status==='Terpasang');
pelangganAktif.innerText=aktif.length;
const pAktif=pct(
  bulanIni.filter(t=>t.status==='Terpasang').length,
  bulanLalu.filter(t=>t.status==='Terpasang').length
);
persenAktif.innerHTML=`${pAktif>=0?'▲':'▼'} ${Math.abs(pAktif)}% Penambahan`;
persenAktif.className=`stat-desc ${pAktif>=0?'text-up':'text-down'}`;

menungguInstalasi.innerText=data.filter(t=>t.status==='Menunggu Instalasi').length;

/* BAR */
const hari=['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
const count=[0,0,0,0,0,0,0];
data.forEach(t=>count[new Date(t.created_at).getDay()]++);
const max=Math.max(...count,1);
barChart.innerHTML='';
hari.forEach((h,i)=>{
  barChart.innerHTML+=`
  <div class="bar-group">
    <div style="height:180px;width:36px;background:#f1f5f9;border-radius:6px;margin:auto;display:flex;align-items:flex-end">
      <div style="width:100%;height:${(count[i]/max)*100}%;background:#0b6fd6;border-radius:6px"></div>
    </div>
    <div style="margin-top:6px">${h}</div>
    <strong>${count[i]}</strong>
  </div>`;
});

/* DONUT */
const paketData=data.filter(t=>t.paket);
const paketCount={};
paketData.forEach(t=>{
  paketCount[t.paket.nama]=(paketCount[t.paket.nama]||0)+1;
});
let start=0,grad=[];
paketLegend.innerHTML='';
Object.entries(paketCount).forEach(([p,j])=>{
  const per=((j/paketData.length)*100).toFixed(1);
  grad.push(`${warnaPaket[p]} ${start}% ${start+Number(per)}%`);
  start+=Number(per);
  paketLegend.innerHTML+=`
  <div style="display:flex;justify-content:space-between">
    <div><span style="display:inline-block;width:10px;height:10px;background:${warnaPaket[p]};border-radius:3px"></span> ${p}</div>
    <strong>${j} (${per}%)</strong>
  </div>`;
});
document.querySelector('.donut-chart').style.background=`conic-gradient(${grad.join(',')})`;
donutTotal.innerText=paketData.length;

/* TABLE */
tamuTable.innerHTML='';
data.slice(0,5).forEach(t=>{
  const map={
    'Terpasang':'badge-green',
    'Proses':'badge-blue',
    'Batal':'badge-red'
  };
  tamuTable.innerHTML+=`
  <tr>
    <td>#REG-${String(t.id).padStart(3,'0')}</td>
    <td>${t.nama}<br><small>${t.kontak}</small></td>
    <td>${t.wilayah?.nama||'-'}</td>
    <td>${t.paket?.nama||'-'}</td>
    <td>${new Date(t.created_at).toLocaleDateString('id-ID')}</td>
    <td><span class="badge ${map[t.status]||'badge-yellow'}">${t.status}</span></td>
  </tr>`;
});
});
</script>

</body>
</html>
