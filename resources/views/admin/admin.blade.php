<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Hotel Panel' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-gray-900/70 backdrop-blur-xl shadow-2xl p-6 flex flex-col justify-between 
                  border-r border-gray-700">

        <div>
            <h2 class="text-3xl font-extrabold text-indigo-400 mb-10">
                Metland Hotel
            </h2>

            <nav class="space-y-3 text-gray-300">

                <a href="{{ route('admin.dashboard') }}"
                   class="group flex items-center gap-3 p-3 rounded-xl
                   {{ request()->routeIs('db_sp_admin') 
                      ? 'bg-indigo-600/20 text-indigo-300 shadow-lg shadow-indigo-500/20'
                      : 'hover:bg-indigo-600/20 hover:text-indigo-300' }}
                   transition-all duration-300">
                    <img src="https://img.icons8.com/fluency/48/dashboard-layout.png"
                         class="w-6 h-6 group-hover:scale-125 transition">
                    <span>Dashboard</span>
                </a>

                <!-- <a href="{{ route('super.admin.users.index') }}"
                   class="group flex items-center gap-3 p-3 rounded-xl
                   {{ request()->routeIs('users.*') 
                      ? 'bg-indigo-600/20 text-indigo-300 shadow-lg shadow-indigo-500/20'
                      : 'hover:bg-indigo-600/20 hover:text-indigo-300' }}
                   transition-all duration-300">
                    <img src="https://img.icons8.com/fluency/48/conference.png"
                         class="w-6 h-6 group-hover:scale-125 transition">
                    <span>Daftar Pengguna</span>
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
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="flex items-center gap-3 w-full p-3 text-red-400
                       hover:bg-red-500/20 hover:text-red-300 rounded-xl">
                🚪 Logout
            </button>
        </form>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-10">
        <!-- HEADER -->
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-bold text-indigo-400">
                    @yield('header')
                </h1>
                <p class="text-gray-400">@yield('subheader')</p>
            </div>

            <div class="flex items-center gap-4 bg-gray-900/70 px-5 py-3 rounded-xl border border-gray-700">
                <div class="text-right">
                    <p class="font-bold">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-indigo-400 capitalize">{{ Auth::user()->role }}</p>
                </div>
                <img src="https://i.pravatar.cc/60?u={{ Auth::user()->email }}"
                     class="w-12 h-12 rounded-full">
            </div>
        </header>

        @yield('content')
    </main>

</div>
</body>
</html>
