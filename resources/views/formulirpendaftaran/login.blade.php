<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            /* Palette Warna yang lebih Premium */
            --primary: #2563eb; 
            --primary-hover: #1d4ed8;
            --bg-gradient-1: #eff6ff;
            --bg-gradient-2: #dbeafe;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #cbd5e1;
            --white: #ffffff;
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-glow: 0 0 15px rgba(37, 99, 235, 0.2);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--bg-gradient-1) 0%, var(--bg-gradient-2) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: var(--text-main);
            overflow: hidden; /* Mencegah scroll saat animasi */
        }

        /* Dekorasi Background (Lingkaran halus) */
        body::before, body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            z-index: -1;
            opacity: 0.6;
        }
        body::before {
            width: 400px; height: 400px;
            background: #60a5fa;
            top: -100px; right: -100px;
            filter: blur(80px);
            animation: float 8s infinite alternate;
        }
        body::after {
            width: 300px; height: 300px;
            background: #93c5fd;
            bottom: -50px; left: -50px;
            filter: blur(60px);
            animation: float 10s infinite alternate-reverse;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(20px, 40px); }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px); /* Efek kaca */
            padding: 48px 40px;
            border-radius: 24px;
            width: 100%;
            max-width: 420px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.6);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-logo { text-align: center; margin-bottom: 35px; }

        /* Style baru untuk gambar logo */
        .brand-image {
            height: 60px; /* Sesuaikan tinggi logo di sini */
            width: auto;
            margin-bottom: 15px;
            /* Opsional: tambahkan filter drop-shadow jika logo PNG transparan agar lebih menonjol */
            /* filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1)); */
        }

        .brand-logo h1 { 
            color: var(--text-main); 
            font-size: 28px; 
            font-weight: 800; 
            letter-spacing: -0.5px; 
            margin-bottom: 5px;
            margin-top: 0;
        }
        .brand-logo p { color: var(--text-muted); font-size: 14px; font-weight: 500; }

        .form-group { margin-bottom: 24px; position: relative; }
        
        .form-label { 
            display: block; 
            font-size: 13px; 
            font-weight: 600; 
            margin-bottom: 8px; 
            color: var(--text-main);
            margin-left: 2px;
        }

        .input-wrapper { position: relative; }
        
        .input-icon { 
            position: absolute; 
            left: 16px; 
            top: 50%; 
            transform: translateY(-50%); 
            color: #94a3b8;
            font-size: 16px;
            transition: 0.3s;
        }

        .form-control {
            width: 100%; 
            padding: 14px 14px 14px 48px; 
            border-radius: 12px;
            border: 2px solid #e2e8f0; 
            font-size: 15px; 
            background: #f8fafc;
            color: var(--text-main);
            outline: none; 
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control::placeholder { color: #cbd5e1; font-weight: 400; }

        .form-control:focus { 
            border-color: var(--primary); 
            background: var(--white);
            box-shadow: var(--shadow-glow);
        }

        .form-control:focus + .input-icon { color: var(--primary); }
        .input-wrapper:focus-within .input-icon { color: var(--primary); }

        .toggle-password { 
            position: absolute; 
            right: 16px; 
            top: 50%; 
            transform: translateY(-50%); 
            cursor: pointer; 
            border: none; 
            background: none; 
            color: #94a3b8;
            transition: 0.3s;
        }
        .toggle-password:hover { color: var(--text-main); }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 13px;
        }
        
        .check-group { display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--text-muted); }
        .check-group input { cursor: pointer; accent-color: var(--primary); width: 16px; height: 16px; }
        
        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }
        .forgot-link:hover { text-decoration: underline; color: var(--primary-hover); }

        .btn-login {
            width: 100%; 
            padding: 16px; 
            background: var(--primary); 
            color: white;
            border: none; 
            border-radius: 12px; 
            font-size: 16px; 
            font-weight: 700; 
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .btn-login:hover { 
            background: var(--primary-hover); 
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }
        
        .btn-login:active { transform: translateY(0); }

        .alert-error {
            background: #fef2f2; 
            border: 1px solid #fecaca;
            color: #ef4444; 
            padding: 12px 16px; 
            border-radius: 12px; 
            font-size: 14px; 
            margin-bottom: 24px; 
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Footer kecil */
        .footer-text {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #94a3b8;
        }

        @media (max-width: 480px) {
            .login-card { padding: 32px 24px; max-width: 90%; }
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-logo">
        <img src="{{ asset('storage/gambar/gintara.png') }}" alt="Logo Gintara" class="brand-image">
        
        <h1>GINTARA</h1>
        <p>Portal Sistem Informasi Pegawai</p>
    </div>

    @if(session('error'))
        <div class="alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="email">Alamat Email</label>
            <div class="input-wrapper">
                <i class="fa-regular fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="form-control" placeholder="nama@gmail.com" required autocomplete="email" autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Kata Sandi</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock input-icon"></i>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi Anda" required>
                <button type="button" class="toggle-password" onclick="togglePass()" aria-label="Lihat Password">
                    <i id="eyeIcon" class="fa-regular fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-options">
            <label class="check-group">
                <input type="checkbox" name="remember">
                <span>Ingat Saya</span>
            </label>
            <a href="#" class="forgot-link">Lupa Sandi?</a>
        </div>

        <button type="submit" class="btn-login">
            Masuk ke Portal <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
        </button>
    </form>

    <div class="footer-text">
        &copy; {{ date('Y') }} Gintara Corp. All rights reserved.
    </div>
</div>

<script>
    function togglePass() {
        const pass = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        
        if (pass.type === 'password') {
            pass.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            pass.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>