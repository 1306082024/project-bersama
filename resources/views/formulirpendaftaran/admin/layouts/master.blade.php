<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Gintara')</title>
    
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    @include('admin.partials.sidebar')

    <main class="main">
        <header class="header">
            <div>
                <h2>@yield('header_title')</h2>
            </div>
            <div class="user-profile">
                <div style="text-align:right; margin-right:12px;">
                    <div style="font-weight:600;font-size:14px">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div style="font-size:12px;color:#6b7280">Admin</div>
                </div>
                <div class="avatar" style="width:40px;height:40px;background:#e0e7ff;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#0b6fd6;font-weight:bold;">A</div>
            </div>
        </header>

        @yield('content')
        
    </main>

</body>
</html>