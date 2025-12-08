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
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        /* ====================================================
           BACKGROUND ANIMASI (GRADIENT BALL + PARTICLES)
        ==================================================== */
        .bg-animated {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0f2c, #0f183f);
            z-index: -5;
            overflow: hidden;
        }

        .ball1,
        .ball2 {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.65;
        }

        .ball1 {
            background: rgba(0, 132, 255, 0.6);
            top: -120px;
            left: -80px;
            animation: moveBall1 15s infinite alternate ease-in-out;
        }

        .ball2 {
            background: rgba(255, 0, 153, 0.45);
            bottom: -140px;
            right: -100px;
            animation: moveBall2 18s infinite alternate ease-in-out;
        }

        @keyframes moveBall1 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(150px, 180px);
            }
        }

        @keyframes moveBall2 {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-160px, -120px);
            }
        }

        /* Particles */
        .particles span {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            filter: blur(1px);
            animation: floatUp 6s infinite ease-in-out;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0);
                opacity: 0.4;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateY(-50px);
                opacity: 0.4;
            }
        }

        /* ====================================================
                        NAVBAR & UI NORMAL
        ==================================================== */
        .navbar {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            color: black;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 18px 18px;
            animation: fadeIn 1.2s;
            position: relative;
            z-index: 2;
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
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .hero {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
            position: relative;
            z-index: 1;
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

        .card.yellow {
            background: linear-gradient(140deg, #fdc55bff, #ffc61aff);
        }

        .card.pink {
            background: linear-gradient(140deg, #e897e8ff, #f600deff);
        }

        .card.green {
            background: linear-gradient(140deg, #87ffabff, #43e117ff);
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

        /* ================================
           CARD BERANDA UTAMA (TAMBAHAN)
        =================================*/
        .main-home-card {
            width: 200px;
            margin: 35px auto;
            padding: 35px;
            text-align: center;
            background: linear-gradient(140deg, #00b7ff, #0066ff);
            border-radius: 25px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            cursor: pointer;
            transition: .25s;
        }

        .main-home-card:hover {
            transform: translateY(-6px);
            opacity: 0.95;
        }

        .main-home-card img {
            width: 70px;
            margin-bottom: 12px;
        }

        a {
            text-decoration: none;
            /* Hilangin garis bawah */
            color: inherit;
            /* Ikutin warna card (biar gak biru) */
        }

        a:hover {
            text-decoration: none;
        }

        /* ANIMATIONS */
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 12px rgba(255, 255, 255, 0.25);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            }

            100% {
                box-shadow: 0 0 12px rgba(255, 255, 255, 0.25);
            }
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- ====================================================
               BACKGROUND ANIMATION ELEMENTS
    ==================================================== -->
    <div class="bg-animated">
        <div class="ball1"></div>
        <div class="ball2"></div>

        <div class="particles">
            <script>
                for (let i = 0; i < 25; i++) {
                    let dot = document.createElement("span");
                    dot.style.left = Math.random() * 100 + "%";
                    dot.style.top = Math.random() * 100 + "%";
                    dot.style.animationDelay = (Math.random() * 6) + "s";
                    document.currentScript.parentNode.appendChild(dot);
                }
            </script>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <img src="{{ asset('images/gintara.png') }}" />
            <span>GINTARA.NET</span>
        </div>

        <div style="display:flex; align-items:center; gap:22px;">
            <div id="datetime" class="datetime-box">Loading...</div>

            <img src="https://img.icons8.com/ios-filled/50/search.png" style="width:22px; cursor:pointer;" />
            <img src="https://img.icons8.com/ios-filled/50/appointment-reminders.png" style="width:22px; cursor:pointer;" />
            <img src="https://img.icons8.com/ios-filled/50/user.png" style="width:22px; cursor:pointer;" />
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">

        <div style="display:flex; justify-content:center; align-items:center; gap:12px; animation: fadeUp 1.4s;">
            <img src="{{ asset('images/gintara.png') }}" style="width:45px;">
            <h2 style="font-size:34px; font-weight:600; margin:0;">Gintara IPTV</h2>
        </div>

        <p style="font-size:15px; opacity:0.8; animation: fadeUp 1.6s;">
            Layanan hiburan digital dari Gintara.NET untuk pengalaman streaming stabil dan tanpa buffering.
        </p>

        <div style="margin-top:30px; display:flex; justify-content:center;">
            <div style="
                padding:25px;
                margin: 5px;
                background:rgba(255,255,255,0.08);
                border-radius:20px;
            ">
                <img src="https://img.icons8.com/ios-filled/200/family.png" style="width:60px;">
            </div>
            <div style="
                padding:25px;
                margin: 5px;
                background:rgba(255,255,255,0.08);
                border-radius:20px;
            ">
                <img src="https://img.icons8.com/ios-filled/200/user.png" style="width:60px;">
            </div>
            <div style="
                padding:25px;
                margin: 5px;
                background:rgba(255,255,255,0.08);
                border-radius:20px;
            ">
                <img src="https://img.icons8.com/ios-filled/200/businessman.png" style="width:60px;">
            </div>
        </div>

        <!-- ===========================
             CARD BERANDA (TAMBAHAN)
        ============================ -->
        <a href="#">
            <div class="main-home-card" style="animation: slideUp 0.9s;">
                <img src="https://img.icons8.com/ios-filled/100/home.png" />
                <h3>BERANDA</h3>
                <p style="font-size: 13px;">Halaman utama layanan GINTARA.NET</p>
            </div>
        </a>

        <!-- GRID MENU -->
         <a href="#">
             <div class="menu-grid">
                 <div class="card" style="animation: slideUp 1s;">
                     <img src="https://img.icons8.com/ios-filled/100/tv.png" />
                     <h3>LIVE TV</h3>
                     <p style="font-size: 12px;">100+ channel lokal & internasional</p>
                 </div>

         </a>

         <a href="#">
             <div class="card red" style="animation: slideUp 1.2s;">
                 <img src="https://img.icons8.com/ios-filled/100/play-button-circled.png" />
                 <h3>MOVIES</h3>
                 <p style="font-size: 12px;">Film terbaru siap ditonton</p>
             </div>
         </a>

         <a href="#">
             <div class="card purple" style="animation: slideUp 1.4s;">
                 <img src="https://img.icons8.com/ios-filled/100/clapperboard.png" />
                 <h3>SERIES</h3>
                 <p style="font-size: 12px;">Serial lengkap berbagai genre</p>
             </div>
         </a>

         <a href="#">
             <div class="card yellow">
                 <img src="https://img.icons8.com/ios-filled/100/food.png" />
                 <h3>RESTORAN</h3>
                 <p style="font-size: 12px;">Berbagai macam restoran</p>
             </div>
         </a>

         <a href="#">
             <div class="card pink">
                 <img src="https://img.icons8.com/ios-filled/100/service.png" />
                 <h3>LAYANAN</h3>
                 <p style="font-size: 12px;">Menyediakan berbagai layanan</p>
             </div>
         </a>

         <a href="#">
             <div class="card green">
                 <img src="https://img.icons8.com/ios-filled/100/door.png" />
                 <h3>FASILITAS</h3>
                 <p style="font-size: 12px;">Fasilitas yang lengkap dan dapat dinikmati</p>
             </div>
         </a>
        </div>

        <div style="margin-top:30px; display:flex; justify-content:center; gap:20px;">
            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px; animation: slideUp 1.6s;"> <img src="https://img.icons8.com/ios-filled/50/wifi.png" style="width:20px;"> <span style="font-size:13px;">Streaming Stabil</span> </div>
            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px; animation: slideUp 1.7s;"> <img src="https://img.icons8.com/ios-filled/50/clapperboard.png" style="width:20px;"> <span style="font-size:13px;">Banyak Konten</span> </div>
            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px; animation: slideUp 1.8s;"> <img src="https://img.icons8.com/ios-filled/50/phone.png" style="width:20px;"> <span style="font-size:13px;">Support 24 Jam</span> </div>
            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px; animation: slideUp 1.8s;"> <img src="https://img.icons8.com/ios-filled/50/service.png" style="width:20px;"> <span style="font-size:13px;">Service yang selalu siap</span> </div>
            <div style="display:flex; align-items:center; gap:8px; background:#142b6f; padding:10px 18px; border-radius:14px; animation: slideUp 1.8s;"> <img src="https://img.icons8.com/ios-filled/50/door.png" style="width:20px;"> <span style="font-size:13px;">Fasilitas yang terbaik</span> </div>
        </div>

        <div class="footer" style="animation: fadeUp 2s;">Powered by Gintara.NET</div>
    </section>

    <!-- DATE & TIME SCRIPT -->
    <script>
        function updateDateTime() {
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

            let now = new Date();
            let dayName = days[now.getDay()];
            let date = now.getDate();
            let month = months[now.getMonth()];
            let year = now.getFullYear();

            let hours = now.getHours().toString().padStart(2, "0");
            let minutes = now.getMinutes().toString().padStart(2, "0");

            let weatherIcon = "⛅";

            document.getElementById("datetime").innerHTML =
                `${weatherIcon} ${dayName}, ${date} ${month} ${year} • ${hours}:${minutes}`;
        }

        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>

</body>

</html>