<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'IPTV Hotel' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #0a1a2f;
            color: white;
            display: flex;
        }

        /* ========================== SIDEBAR ========================== */
        .sidebar {
            width: 220px;
            background: linear-gradient(180deg, #0b1729, #08111f);
            height: 100vh;
            padding: 25px 20px;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid rgba(255,255,255,0.05);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #38bdf8 transparent;
        }

        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-thumb { background: #38bdf8; border-radius: 10px; }

        .sidebar-logo { text-align: center; padding-bottom: 15px; }
        .sidebar-logo img { width: 70px; filter: drop-shadow(0 0 6px rgba(0,150,255,0.4)); }

        .nav-title {
            font-size: 12px;
            text-transform: uppercase;
            opacity: .5;
            margin: 5px 0 10px 10px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            margin: 6px 0;
            font-size: 15px;
            color: #cbd5e1;
            border-radius: 12px;
            text-decoration: none;
            transition: .25s ease;
        }

        .nav-item img {
            width: 22px;
            opacity: 0.9;
            transition: .3s;
        }

        .nav-item:hover {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
            transform: translateX(5px);
        }

        .nav-item:hover img { transform: scale(1.15); opacity: 1; }

        .nav-item.active {
            background: rgba(14,165,233,0.25);
            color: #38bdf8;
            border-left: 3px solid #38bdf8;
            padding-left: 12px;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            padding: 35px;
            width: calc(100% - 240px);
        }

        .header-top { display: flex; justify-content: space-between; }
        .welcome {
            font-size: 35px; font-weight: 600; line-height: 1.3;
            background: linear-gradient(90deg, #38bdf8, #60a5fa, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .subtitle { opacity: .78; margin-top: 6px; margin-bottom: 25px; font-size: 15px; }
        .clock { font-size: 28px; font-weight: 600; }
        .date { font-size: 14px; opacity: .7; }

        .card-row { display: flex; gap: 20px; margin-top: 20px; }
        .card {
            flex: 1; padding: 25px;
            background: rgba(0, 150, 255, 0.12);
            border-radius: 20px;
            transition: .3s;
            backdrop-filter: blur(3px);
        }
        .card:hover { background: rgba(0,200,255,0.22); transform: translateY(-4px); }

        .card-icon {
            width: 45px; margin-bottom: 10px;
            transition: transform .45s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card:hover .card-icon { transform: scale(1.23); }

        .card-title { font-size: 15px; opacity: .7; margin-bottom: 8px; }
        .card-value { font-size: 30px; font-weight: 600; }

        .promo {
            margin-top: 40px;
            background: linear-gradient(90deg, #0ea5e9, #2563eb, #1d4ed8);
            padding: 40px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }
        .promo-bg {
            position: absolute; right: 0; bottom: -15px;
            font-size: 160px; opacity: 0.1; font-weight: 700;
        }
        .btn {
            background: #22d3ee;
            padding: 12px 22px;
            display: inline-block;
            margin-top: 20px;
            border-radius: 8px;
            font-weight: 600;
            color: #0f172a;
            text-decoration: none;
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    @include('all.app')

    {{-- MAIN CONTENT --}}
    <div class="main">
        @yield('content')
    </div>

    {{-- SCRIPT --}}
    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById("clock").innerText =
                now.getHours().toString().padStart(2, "0") + ":" +
                now.getMinutes().toString().padStart(2, "0");
        }

        function updateDate() {
            const now = new Date();
            const hari = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            const bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

            document.getElementById("date").innerText =
                `${hari[now.getDay()]}, ${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()}`;
        }

        function updateWeather() {
            const hour = new Date().getHours();
            let temp = 30, desc = "Cerah";

            if (hour >= 12 && hour <= 15) temp = 33, desc = "Panas Terik";
            else if (hour > 15 && hour <= 18) temp = 28, desc = "Berawan";
            else temp = 25, desc = "Dingin & Tenang";

            document.getElementById("weather").innerText = temp + "°C";
            document.getElementById("weather-desc").innerText = "Cirebon • " + desc;
        }

        setInterval(updateClock, 1000);
        updateClock();
        updateDate();
        updateWeather();
    </script>

    @stack('scripts')
</body>
</html>
