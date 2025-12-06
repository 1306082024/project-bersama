<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
    :root{
    --bg:#f6fbff;
    --card:#ffffff;
    --muted:#6b7280;
    --primary:#0b6fd6;
    --shadow: 0 10px 30px rgba(10,40,80,0.06);
    }
    
    body{
    background:linear-gradient(180deg,#f8fbff 0%, #ffffff 100%);
    padding:28px;
    font-family:Inter,system-ui,sans-serif;
    }

    .shell{width:100%;max-width:1280px;margin:0 auto;display:flex;flex-direction:column;gap:20px}
    
    .card-custom{
    background:var(--card);
    padding:18px;
    border-radius:12px;
    box-shadow:var(--shadow);
    border:1px solid rgba(7,19,37,0.04);
    }

    .table-container {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid rgba(7,19,37,0.04);
    }
    .table th{background:#f1f7ff;color:#042244; font-weight: 600;}
    .table td{vertical-align: middle;}
    
    .btn-warning { color: #fff; }
    .btn-warning:hover { color: #fff; }
</style>
</head>

<body>
<main class="shell">

<section class="card-custom">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h2 class="mb-1">Dashboard Admin</h2>
        <div class="text-muted small">Kelola semua entri buku tamu.</div>
    </div>

    <div class="d-flex gap-2 align-items-center">
        <input class="form-control form-control-sm" style="width: 200px;" placeholder="Cari..." id="search">
        <button class="btn btn-outline-primary btn-sm" id="exportBtn"><i class="bi bi-file-earmark-spreadsheet"></i> CSV</button>
    </div>
    </div>
</section>

<section class="card-custom">
    <h3 class="mb-3">Daftar Tamu</h3>

    <div class="table-responsive table-container">
    <table class="table table-hover mb-0" id="entryTable">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Paket</th>
            <th>Pesan</th>
            <th>Kontak</th>
            <th>Waktu</th>
            <th class="text-center" style="width: 120px;">Aksi</th>
        </tr>
        </thead>

        <tbody id="tbody">
        <tr>
            <td>1</td>
            <td class="nama-tamu">Andi Rahman</td> <td><span class="badge bg-success">Hemat</span></td>
            <td class="pesan-tamu">Saya ingin pemasangan minggu ini.</td> <td>08123456789</td>
            <td class="small text-muted">12 Jan 2025, 10:22</td>
            
            <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-warning btn-sm" onclick="editRow(this)" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" title="Hapus">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <td>2</td>
            <td class="nama-tamu">Sri Lestari</td>
            <td><span class="badge bg-primary">Mantap</span></td>
            <td class="pesan-tamu">Koneksi apakah stabil untuk WFH?</td>
            <td>085333123123</td>
            <td class="small text-muted">13 Jan 2025, 09:11</td>
            
            <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-warning btn-sm" onclick="editRow(this)" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" title="Hapus">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
    </div>
</section>

</main>
</body>
</html>