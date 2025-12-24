<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metland</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-100">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            class="w-72 bg-gray-900/70 backdrop-blur-xl shadow-2xl p-6 flex flex-col justify-between 
               border-r border-gray-700 transition-shadow duration-500 hover:shadow-indigo-500/20">

            <!-- LOGO -->
            <div>
                <h2 class="text-3xl font-extrabold text-indigo-400 mb-10 tracking-wide">
                    Metland Hotel
                </h2>

                <!-- MENU -->
                <nav class="space-y-3 text-gray-300">

                    <!-- DASHBOARD -->
                    <a href="#"
                        class="group flex items-center gap-3 p-3 rounded-xl
                          bg-indigo-600/20 text-indigo-300
                          shadow-lg shadow-indigo-500/20
                          transition-all duration-300">
                        <img src="https://img.icons8.com/fluency/48/dashboard-layout.png"
                            class="w-6 h-6 transition-transform duration-300 
                                group-hover:scale-125 group-hover:rotate-6">
                        <span class="text-lg">Dashboard</span>
                    </a>

                    <!-- DATA PENGGUNA
                    <a href="{{ route('super.admin.users.index') }}"
                        class="group flex items-center gap-3 p-3 rounded-xl
                          hover:bg-indigo-600/20 hover:text-indigo-300
                          hover:shadow-lg hover:shadow-indigo-500/20
                          transition-all duration-300">
                        <img src="https://img.icons8.com/fluency/48/conference.png"
                            class="w-6 h-6 transition-transform duration-300 
                                group-hover:scale-125 group-hover:-rotate-6">
                        <span class="text-lg">Data Pengguna</span>
                    </a> -->

                    <!-- KELOLA RUANGAN -->
                    <a href="{{ route('admin.rooms.index') }}"
                        class="group flex items-center gap-3 p-3 rounded-xl
                          hover:bg-indigo-600/20 hover:text-indigo-300
                          hover:shadow-lg hover:shadow-indigo-500/20
                          transition-all duration-300">
                        <img src="https://img.icons8.com/fluency/48/manager.png"
                            class="w-6 h-6 transition-transform duration-300 
                                group-hover:scale-125 group-hover:rotate-6">
                        <span class="text-lg">Kelola Ruangan</span>
                    </a>

                    <!-- TAMU & PERANGKAT -->
                    <a href="{{ route('admin.guests.index') }}"
                        class="group flex items-center gap-3 p-3 rounded-xl
                          hover:bg-indigo-600/20 hover:text-indigo-300
                          hover:shadow-lg hover:shadow-indigo-500/20
                          transition-all duration-300">
                        <img src="https://img.icons8.com/fluency/48/wifi.png"
                            class="w-6 h-6 transition-transform duration-300 
                                group-hover:scale-125 group-hover:-rotate-6">
                        <span class="text-lg">Tamu dan Perangkat</span>
                    </a>

                    <!-- PESAN MAKANAN -->
                    <a href="{{ route('admin.food-orders.index') }}"
                        class="group flex items-center gap-3 p-3 rounded-xl
                          hover:bg-indigo-600/20 hover:text-indigo-300
                          hover:shadow-lg hover:shadow-indigo-500/20
                          transition-all duration-300">
                        <img src="https://img.icons8.com/color/48/meal.png"
                            class="w-6 h-6 transition-transform duration-300 
                                group-hover:scale-125 group-hover:-rotate-12">
                        <span class="text-lg">Pesan Makanan</span>
                    </a>

                </nav>
            </div>

            <!-- LOGOUT -->
            <div class="pt-6 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="group flex items-center gap-3 w-full p-3 text-red-400
                           hover:bg-red-500/20 hover:text-red-300
                           rounded-xl font-semibold transition-all duration-300">
                        <span class="transition-transform duration-300 group-hover:translate-x-1">🚪</span>
                        Logout
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
                        Panel Metland Hotel
                    </h1>
                    <p class="text-gray-400 mt-1">Kontrol penuh sistem IPTV Hotel</p>
                </div>

                <!-- PROFILE -->
                <div
                    class="flex items-center gap-4 bg-gray-900/70 px-5 py-3 rounded-2xl 
                       shadow-lg border border-gray-700">
                    <div class="text-right">
                        <p class="font-bold text-gray-100 text-lg">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm text-indigo-400 capitalize">
                            {{ Auth::user()->role }}
                        </p>
                    </div>
                    <img src="https://i.pravatar.cc/60?u={{ Auth::user()->email }}"
                        class="rounded-full w-14 h-14 shadow-lg border border-gray-700">
                </div>

            </header>

            <!-- CARDS -->
            <!-- CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7">

                <!-- {{-- TOTAL USERS --}}
                <div
                    class="bg-gradient-to-br from-indigo-600 to-indigo-400 shadow-xl p-6 rounded-2xl 
               hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold text-white">Total Pengguna</h3>
                    <p class="text-5xl font-extrabold text-white mt-3">
                        {{ $totalUsers }}
                    </p>
                </div> -->

                {{-- ROOMS --}}
                <div
                    class="bg-gradient-to-br from-purple-600 to-purple-400 shadow-xl p-6 rounded-2xl 
               hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold text-white">Kelola Ruangan</h3>
                    <p class="text-5xl font-extrabold text-white mt-3">
                        {{ $totalRooms }}
                    </p>
                </div>

                {{-- GUEST & DEVICE --}}
                <div
                    class="bg-gradient-to-br from-pink-600 to-pink-400 shadow-xl p-6 rounded-2xl 
               hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold text-white">Tamu & Perangkat</h3>
                    <p class="text-5xl font-extrabold text-white mt-3">
                        {{ $totalGuests }}
                    </p>
                </div>

                {{-- FOOD ORDER --}}
                <div
                    class="bg-gradient-to-br from-teal-600 to-teal-400 shadow-xl p-6 rounded-2xl 
               hover:scale-105 transition-transform duration-300">
                    <h3 class="text-lg font-semibold text-white">Pesanan Makanan</h3>
                    <p class="text-5xl font-extrabold text-white mt-3">
                        {{ $totalOrders }}
                    </p>
                </div>

            </div>
            <!-- STATISTIK HARI INI -->
            <div class="mt-10">
                <h2 class="text-xl font-bold text-gray-300 mb-4">
                    Statistik Hari Ini
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- TAMU HARI INI -->
                    <div class="bg-gray-900/70 border border-gray-700 rounded-xl p-5">
                        <p class="text-gray-400">Check-in Hari Ini</p>
                        <h3 class="text-3xl font-extrabold text-indigo-400 mt-2">
                            {{ $tamuHariIni }}
                        </h3>
                    </div>

                    <!-- PESANAN HARI INI -->
                    <div class="bg-gray-900/70 border border-gray-700 rounded-xl p-5">
                        <p class="text-gray-400">Pesanan Hari Ini</p>
                        <h3 class="text-3xl font-extrabold text-pink-400 mt-2">
                            {{ $pesananHariIni }}
                        </h3>
                    </div>

                    <!-- KAMAR TERSEDIA -->
                    <div class="bg-gray-900/70 border border-gray-700 rounded-xl p-5">
                        <p class="text-gray-400">Kamar Tersedia</p>
                        <h3 class="text-3xl font-extrabold text-green-400 mt-2">
                            {{ $kamarTersedia }}
                        </h3>
                    </div>

                    <!-- PESANAN PENDING -->
                    <div class="bg-gray-900/70 border border-gray-700 rounded-xl p-5">
                        <p class="text-gray-400">Pesanan Pending</p>
                        <h3 class="text-3xl font-extrabold text-yellow-400 mt-2">
                            {{ $pesananPending }}
                        </h3>
                    </div>

                </div>
            </div>


        </main>
    </div>

</body>

</html>