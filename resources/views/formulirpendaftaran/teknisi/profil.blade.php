<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Teknisi - Gintara</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary:#0b6fd6;
            --primary-light:#e0f2fe;
            --bg-body:#f4f7fa;
            --bg-card:#ffffff;
            --text-main:#1f2937;
            --text-muted:#6b7280;
            --border:#e5e7eb;
            --success:#10b981;
            --warning:#f59e0b;
            --danger:#ef4444;
            --sidebar-width:260px;
            --shadow:0 4px 6px -1px rgba(0,0,0,.05), 0 2px 4px -1px rgba(0,0,0,.03);
        }

        *{box-sizing:border-box}
        body{
            margin:0;
            font-family:'Inter',sans-serif;
            background:var(--bg-body);
            color:var(--text-main);
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */
        .sidebar{
            width:var(--sidebar-width);
            background:var(--bg-card);
            border-right:1px solid var(--border);
            position:fixed;
            height:100%;
            top:0;left:0;
            display: flex;
            flex-direction: column;
        }
        .sidebar-logo {
            padding: 24px;
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            border-bottom: 1px solid var(--border);
        }
        .nav{padding:20px 16px; flex: 1; overflow-y: auto;}
        .nav-label{
            font-size:11px;
            text-transform:uppercase;
            color:var(--text-muted);
            margin:20px 0 8px 12px;
            font-weight:600;
            letter-spacing: 0.5px;
        }
        .nav-item{
            display:flex;
            align-items:center;
            padding:12px;
            color:var(--text-muted);
            text-decoration:none;
            border-radius:8px;
            margin-bottom:4px;
            font-size:14px;
            font-weight:500;
            transition: all 0.2s;
        }
        .nav-item:hover{background:var(--primary-light); color:var(--primary)}
        .nav-item.active{
            background:var(--primary);
            color:#fff;
            box-shadow:0 4px 12px rgba(11,111,214,.2);
        }
        .nav-icon{margin-right:12px; width: 20px; text-align: center;}

        /* MAIN */
        .main{
            margin-left:var(--sidebar-width);
            flex:1;
            padding:30px;
        }

        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        /* PROFILE SPECIFIC STYLES */
        .profile-container {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 24px;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .profile-card .avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 700;
            margin: 0 auto 20px;
            border: 4px solid #fff;
            box-shadow: 0 0 0 1px var(--border);
        }

        .stat-badges {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid var(--border);
            font-family: inherit;
            font-size: 14px;
            transition: 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-control[readonly] {
            background-color: #f9fafb;
            cursor: not-allowed;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary { background: var(--primary); color: white; border: none; }
        .btn-primary:hover { opacity: 0.9; }

        @media(max-width:1024px){
            .profile-container {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width:768px){
            .sidebar{display:none}
            .main{margin-left:0;padding:20px}
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <nav class="nav">
        <a href="/teknisi" class="nav-item">
            <span class="nav-icon"><i class="fa-solid fa-house"></i></span> Dashboard
        </a>

        <div class="nav-label">Manajemen Tugas</div>
        <a href="/teknisi/tugas" class="nav-item">
            <span class="nav-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span> Tugas Instalasi
        </a>
        <a href="/teknisi/gangguan" class="nav-item">
            <span class="nav-icon"><i class="fa-solid fa-circle-exclamation"></i></span> Perbaikan Gangguan
        </a>
        <a href="/teknisi/riwayat" class="nav-item">
            <span class="nav-icon"><i class="fa-solid fa-clock-rotate-left"></i></span> Riwayat Kerja
        </a>

        <div class="nav-label">Akun</div>
        <a href="/teknisi/profil" class="nav-item active">
            <span class="nav-icon"><i class="fa-solid fa-user-gear"></i></span> Profil & Keamanan
        </a>
        <a href="/logout" class="nav-item" style="color: var(--danger)">
            <span class="nav-icon"><i class="fa-solid fa-right-from-bracket"></i></span> Logout
        </a>
    </nav>
</aside>

<main class="main">
    <div class="header">
        <div>
            <h1 style="margin:0">Profil & Keamanan</h1>
            <p style="margin:4px 0 0;color:var(--text-muted);font-size:14px">Kelola informasi diri dan keamanan akun Anda.</p>
        </div>
    </div>

    <div class="profile-container">
        <div class="profile-card">
            <div class="avatar-large">BS</div>
            <h2 style="margin: 0 0 8px 0;">Budi Santoso</h2>
            <p style="color: var(--text-muted); margin: 0; font-size: 14px;">Senior Technician</p>
            <div style="margin-top: 10px;">
                <span class="badge badge-green">Online / Aktif</span>
            </div>

            <div class="stat-badges">
                <div style="text-align: center;">
                    <small style="display: block; color: var(--text-muted); font-size: 11px;">MASA KERJA</small>
                    <strong>2 Tahun</strong>
                </div>
                <div style="border-left: 1px solid var(--border); padding-left: 15px; text-align: center;">
                    <small style="display: block; color: var(--text-muted); font-size: 11px;">RATING</small>
                    <strong style="color: var(--warning);"><i class="fa-solid fa-star"></i> 5.0</strong>
                </div>
            </div>
        </div>

        <div class="form-card">
            <h3 style="margin-top: 0; margin-bottom: 25px;">Data Diri</h3>
            <form id="profileForm">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>ID Teknisi</label>
                        <input type="text" class="form-control" value="T-GINT-0042" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="Budi Santoso">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon / WhatsApp</label>
                    <input type="text" class="form-control" value="0812-3456-7890">
                </div>

                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" class="form-control" value="budi.gintara@email.com">
                </div>

                <hr style="border: 0; border-top: 1px solid var(--border); margin: 30px 0;">
                
                <h3 style="margin-top: 0; margin-bottom: 25px;">Keamanan Akun</h3>
                
                <div class="form-group">
                    <label>Kata Sandi Lama</label>
                    <input type="password" class="form-control" placeholder="Masukkan sandi lama untuk verifikasi">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>Kata Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="Minimal 8 karakter">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Sandi Baru</label>
                        <input type="password" class="form-control" placeholder="Ulangi sandi baru">
                    </div>
                </div>

                <div style="margin-top: 20px; text-align: right;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.getElementById('profileForm').onsubmit = function(e) {
        e.preventDefault();
        alert('Data berhasil diperbarui');
    };
</script>

</body>
</html>