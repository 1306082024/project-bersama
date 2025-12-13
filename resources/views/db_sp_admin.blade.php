<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin IPTV</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-gray-900/70 backdrop-blur-xl shadow-2xl p-6 flex flex-col justify-between 
                 border-r border-gray-700">

        <!-- LOGO / TITLE -->
        <div>
            <h2 class="text-3xl font-extrabold text-indigo-400 mb-10 tracking-wide">
                SUPER ADMIN
            </h2>

            <!-- MENU -->
            <nav class="space-y-3 text-gray-300">

                <a href="#" 
                   class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-600/20 
                          hover:text-indigo-300 transition">
                    🚀 <span class="text-lg">Dashboard</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-600/20 
                          hover:text-indigo-300 transition">
                    🧑‍💼 <span class="text-lg">Kelola Admin</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-600/20 
                          hover:text-indigo-300 transition">
                    🧑‍🤝‍🧑 <span class="text-lg">Data Pengguna</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-600/20 
                          hover:text-indigo-300 transition">
                    📡 <span class="text-lg">IPTV Control</span>
                </a>

                <a href="#" 
                   class="flex items-center gap-3 p-3 rounded-xl hover:bg-indigo-600/20 
                          hover:text-indigo-300 transition">
                    ⚙️ <span class="text-lg">Pengaturan Sistem</span>
                </a>

            </nav>
        </div>

        <!-- LOGOUT -->
        <div class="pt-6 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    class="flex items-center gap-3 w-full p-3 text-red-400 hover:bg-red-500/20 
                           hover:text-red-300 rounded-xl font-semibold transition">
                    🚪 Logout
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-10">

            <div>
                <h1 class="text-4xl font-extrabold text-indigo-400 drop-shadow">
                    Panel Super Admin
                </h1>
                <p class="text-gray-400 mt-1">Kontrol penuh sistem IPTV Hotel</p>
            </div>

            <div class="flex items-center gap-4 bg-gray-900/70 px-5 py-3 rounded-2xl shadow-lg border border-gray-700">
                <div class="text-right">
                    <p class="font-bold text-gray-100 text-lg">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-indigo-400">{{ Auth::user()->role }}</p>
                </div>
                <img src="https://i.pravatar.cc/60" class="rounded-full w-14 h-14 shadow-lg border border-gray-700">
            </div>

        </header>

        <!-- CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7">

            <!-- CARD -->
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-400 shadow-xl p-6 rounded-2xl 
                        hover:scale-105 transition transform duration-200">
                <h3 class="text-lg font-semibold text-white">Total Pengguna</h3>
                <p class="text-5xl font-extrabold text-white mt-3">523</p>
            </div>

            <div class="bg-gradient-to-br from-purple-600 to-purple-400 shadow-xl p-6 rounded-2xl 
                        hover:scale-105 transition">
                <h3 class="text-lg font-semibold text-white">Admin Aktif</h3>
                <p class="text-5xl font-extrabold text-white mt-3">14</p>
            </div>

            <div class="bg-gradient-to-br from-pink-600 to-pink-400 shadow-xl p-6 rounded-2xl 
                        hover:scale-105 transition">
                <h3 class="text-lg font-semibold text-white">Server Status</h3>
                <p class="text-5xl font-extrabold text-white mt-3">99%</p>
            </div>

            <div class="bg-gradient-to-br from-teal-600 to-teal-400 shadow-xl p-6 rounded-2xl 
                        hover:scale-105 transition">
                <h3 class="text-lg font-semibold text-white">Layanan Aktif</h3>
                <p class="text-5xl font-extrabold text-white mt-3">37</p>
            </div>

        </div>

    </main>
</div>

</body>
</html>
