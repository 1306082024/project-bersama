<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page IPTV</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0f2c, #0f183f);
            color: white;
        }

        .navbar {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 600;
        }

        .brand img {
            width: 40px;
        }

        .datetime-box {
            background: #f5f5f5;
            color: black;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .hero {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
        }

        .menu-grid {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }

        .card {
            padding: 30px;
            background: linear-gradient(140deg, #1dd1a1, #2e86de);
            border-radius: 20px;
            text-align: center;
            transition: 0.25s ease-in-out;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            opacity: 0.9;
        }

        .card.red {
            background: linear-gradient(140deg, #ff7675, #d63031);
        }

        .card.purple {
            background: linear-gradient(140deg, #a29bfe, #6c5ce7);
        }

        .card img {
            width: 60px;
            margin-bottom: 15px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            opacity: 0.7;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar" style="background:white; color:black; border-bottom:1px solid #ddd; box-shadow:0 4px 12px rgba(0,0,0,0.1); border-radius:0 0 18px 18px;">

        <div class="brand" style="color:black;">
            <img src="{{ asset('images/gintara.png') }}" />
            <span>GINTARA.NET</span>
        </div>

        <!-- ICONS + DATE -->
        <div style="display:flex; align-items:center; gap:22px;">

            <!-- Hari & tanggal -->
            <div id="datetime" class="datetime-box">Loading...</div>

            <!-- Icons -->
            <img src="https://img.icons8.com/ios-filled/50/search.png"
                style="width:22px; cursor:pointer;" />
            <img src="https://img.icons8.com/ios-filled/50/appointment-reminders.png"
                style="width:22px; cursor:pointer;" />
            <img src="https://img.icons8.com/ios-filled/50/user.png"
                style="width:22px; cursor:pointer;" />
        </div>

    </nav>

    <!-- HERO -->
    <section class="hero">
        <div style="display:flex; justify-content:center; align-items:center; gap:12px;">
            <img src="{{ asset('images/gintara.png') }}" style="width:45px;">
            <h2 style="font-size:34px; font-weight:600; margin:0;">Gintara IPTV</h2>
        </div>
        <p style="font-size:15px; opacity:0.8;">Layanan hiburan digital dari Gintara.NET untuk pengalaman streaming stabil dan tanpa buffering.</p>

        <div style="margin-top:30px; display:flex; justify-content:center;">
            <div style="
    padding:25px;
    background:rgba(255,255,255,0.08);
    border-radius:20px;
    animation: floatUp 3s infinite ease-in-out, glowPulse 3s infinite ease-in-out;
  ">
                <img src="https://img.icons8.com/ios-filled/200/family.png" style="width:160px;">
            </div>
        </div>
        <div class="menu-grid">

            <div class="card">
                <img src="https://img.icons8.com/ios-filled/100/tv.png" />
                <h3>LIVE TV</h3>
                <p style="font-size: 12px;">100+ channel lokal & internasional</p>
            </div>

            <div class="card red">
                <img src="https://img.icons8.com/ios-filled/100/play-button-circled.png" />
                <h3>MOVIES</h3>
                <p style="font-size: 12px;">Film terbaru siap ditonton</p>
            </div>

            <div class="card purple">
                <img src="https://img.icons8.com/ios-filled/100/clapperboard.png" />
                <h3>SERIES</h3>
                <p style="font-size: 12px;">Serial lengkap berbagai genre</p>
            </div>

        </div>

        <!-- FEATURE BOXES -->
        <div style="margin-top:30px; display:flex; justify-content:center; gap:20px;">

            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px;">
                <img src="https://img.icons8.com/ios-filled/50/wifi.png" style="width:20px;">
                <span style="font-size:13px;">Streaming Stabil</span>
            </div>

            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px;">
                <img src="https://img.icons8.com/ios-filled/50/clapperboard.png" style="width:20px;">
                <span style="font-size:13px;">Banyak Konten</span>
            </div>

            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px;">
                <img src="https://img.icons8.com/ios-filled/50/phone.png" style="width:20px;">
                <span style="font-size:13px;">Support 24 Jam</span>
            </div>

        </div>

        <div class="footer">Powered by Gintara.NET</div>
    </section>


    <!-- SCRIPT HARI & TANGGAL -->
    <script>
        function updateDateTime() {
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

            let now = new Date();
            let dayName = days[now.getDay()];
            let date = now.getDate();
            let month = months[now.getMonth()];
            let year = now.getFullYear();

            document.getElementById("datetime").innerText =
                `${dayName}, ${date} ${month} ${year}`;
        }

        updateDateTime();
        setInterval(updateDateTime, 60000); // update tiap 1 menit
    </script>

</body>

</html>