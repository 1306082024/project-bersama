<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal - Gintara</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary:#0b6fd6; --primary-dark:#0856a8; --bg-body:#f4f7fa;
            --text-main:#1f2937; --text-muted:#6b7280; --border:#e5e7eb;
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0; font-family: 'Inter', sans-serif; background: var(--bg-body);
            display: flex; align-items: center; justify-content: center; min-height: 100vh;
        }
        .login-card {
            background: #ffffff; padding: 40px; border-radius: 16px;
            width: 100%; max-width: 400px; box-shadow: var(--shadow); border: 1px solid var(--border);
        }
        .brand-logo { text-align: center; margin-bottom: 30px; }
        .brand-logo h1 { color: var(--primary); margin: 0; font-size: 32px; font-weight: 800; letter-spacing: -1px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 8px; color: var(--text-main); }
        .input-group { position: relative; }
        .input-group i { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .form-control {
            width: 100%; padding: 12px 12px 12px 40px; border-radius: 8px;
            border: 1px solid var(--border); font-size: 14px; outline: none; transition: 0.2s;
        }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(11, 111, 214, 0.1); }
        .btn-login {
            width: 100%; padding: 14px; background: var(--primary); color: white;
            border: none; border-radius: 8px; font-size: 15px; font-weight: 700; cursor: pointer;
        }
        .toggle-password { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; border: none; background: none; color: var(--text-muted); }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-logo">
        <h1>GINTARA</h1>
        <p style="color:var(--text-muted); font-size: 14px;">Portal Login Pegawai</p>
    </div>

    @if(session('error'))
        <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 20px; text-align: center;">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email Anda" required>
            </div>
        </div>

        <div class="form-group">
            <label>KATA SANDI</label>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                <button type="button" class="toggle-password" onclick="togglePass()">
                    <i id="eyeIcon" class="fa-solid fa-eye"></i>
                </button>
            </div>
        </div>

        <button type="submit" class="btn-login">MASUK SEKARANG</button>
    </form>
</div>

<script>
    function togglePass() {
        const pass = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (pass.type === 'password') {
            pass.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            pass.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
</body>
</html>