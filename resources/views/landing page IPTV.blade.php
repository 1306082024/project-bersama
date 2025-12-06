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

    .card.red { background: linear-gradient(140deg, #ff7675, #d63031); }
    .card.purple { background: linear-gradient(140deg, #a29bfe, #6c5ce7); }

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

  <nav class="navbar" style="background:white; color:black; border-bottom:1px solid #ddd; box-shadow:0 4px 12px rgba(0,0,0,0.1); border-radius:0 0 18px 18px;">
    <div class="brand" style="color:black;">
      <img src="" />
      <span style="color:black;">Gintara.Net</span>
    </div>
    <div style="display:flex; align-items:center; gap:18px;">
        <img src="https://img.icons8.com/ios-filled/50/search.png" style="width:22px; cursor:pointer; transition:0.2s;" onmouseover="this.style.opacity=0.6" onmouseout="this.style.opacity=1" />
        <img src="https://img.icons8.com/ios-filled/50/appointment-reminders.png" style="width:22px; cursor:pointer; transition:0.2s;" onmouseover="this.style.opacity=0.6" onmouseout="this.style.opacity=1" />
        <img src="https://img.icons8.com/ios-filled/50/user.png" style="width:22px; cursor:pointer; transition:0.2s;" onmouseover="this.style.opacity=0.6" onmouseout="this.style.opacity=1" />
      </div>
  </nav>

  <section class="hero">
    <h2>Welcome to IPTV Dashboard</h2>
    <p>Pilih kategori tontonan kamu</p>

    <div class="menu-grid">

      <div class="card">
        <img src="https://img.icons8.com/ios-filled/100/tv.png" />
        <h3>LIVE TV</h3>
        <p style="font-size: 12px; margin-top: 8px;">Last updated: 1 day ago</p>
      </div>

      <div class="card red">
        <img src="https://img.icons8.com/ios-filled/100/play-button-circled.png" />
        <h3>MOVIES</h3>
        <p style="font-size: 12px; margin-top: 8px;">Last updated: 8 hours ago</p>
      </div>

      <div class="card purple">
        <img src="https://img.icons8.com/ios-filled/100/clapperboard.png" />
        <h3>SERIES</h3>
        <p style="font-size: 12px; margin-top: 8px;">Last updated: 5 hours ago</p>
      </div>

    </div>

    <div class="search-bar" style="margin-top:30px; display:flex; justify-content:center; gap:10px;">
      <input type="text" placeholder="Search..." style="padding:10px 15px; width:260px; border-radius:10px; border:none; outline:none; font-size:14px;">
      <button style="padding:10px 15px; border:none; border-radius:10px; cursor:pointer; background:#4b7bec; color:white; font-weight:600;">Search</button>
    </div>

    <div class="icon-menu" style="margin-top:30px; display:flex; justify-content:center; gap:25px; opacity:0.9;">
      <img src="https://img.icons8.com/ios-filled/50/appointment-reminders.png" style="width:28px; cursor:pointer;" />
      <img src="https://img.icons8.com/ios-filled/50/user.png" style="width:28px; cursor:pointer;" />
      <img src="https://img.icons8.com/ios-filled/50/settings.png" style="width:28px; cursor:pointer;" />
      <img src="https://img.icons8.com/ios-filled/50/exit.png" style="width:28px; cursor:pointer;" />
    </div>

    <div class="footer" style="margin-top:40px;">
      Expiration: August 21, 2021
    </div>
  </section>

</body>
</html>
