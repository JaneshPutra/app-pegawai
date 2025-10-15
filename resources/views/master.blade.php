<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">@yield('page-title', 'App Pegawai')</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/employees') }}">Pegawai</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/department') }}">Departemen</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/attendance') }}">Absensi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/report') }}">Laporan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/settings') }}">Pengaturan</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="text-center mt-5 mb-3 text-muted">
        &copy; {{ date('Y') }} App Pegawai
    </footer>
</body>
</html>
