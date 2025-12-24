<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-gray-900 via-gray-800 to-black text-gray-100">

    <div class="text-center max-w-md">

        <!-- ICON -->
        <div class="text-7xl mb-6 animate-pulse">🚫</div>

        <!-- TITLE -->
        <h1 class="text-4xl font-extrabold text-red-400 mb-3">
            403 Forbidden
        </h1>

        <!-- DESC -->
        <p class="text-gray-400 mb-8">
            Maaf, kamu tidak memiliki izin untuk mengakses halaman ini.
        </p>

        <!-- ACTION -->
        <div class="flex justify-center gap-4">
            <a href="{{ url()->previous() }}"
               class="px-5 py-2 rounded-xl bg-gray-700 hover:bg-gray-600 transition">
                ⬅ Kembali
            </a>

            @auth
                @if(auth()->user()->role === 'super admin')
                    <a href="{{ route('super.admin.dashboard') }}"
                       class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('display.dashboard') }}"
                       class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 transition">
                        Beranda
                    </a>
                @endif
            @endauth
        </div>

    </div>

</body>
</html>
