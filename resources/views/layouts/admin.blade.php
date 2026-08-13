<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-shell">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-brand">
            <h5>13 Koto Kampar</h5>
            <small>Panel Admin</small>
        </div>
        <div class="admin-sidebar-divider"></div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>
            <a href="{{ route('destinasi') }}" class="{{ request()->routeIs('destinasi*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt"></i> Kelola Destinasi
            </a>
            <a href="{{ route('atraksi') }}" class="{{ request()->routeIs('atraksi*') ? 'active' : '' }}">
                <i class="bi bi-stars"></i> Kelola Atraksi
            </a>
            <a href="{{ route('user') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Kelola User
            </a>
            <a href="{{ route('kategori') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">
                <i class="bi bi-tags-fill"></i> Kelola Kategori
            </a>
        </nav>

        <div class="admin-sidebar-foot">
            <a href="{{ route('beranda') }}">
                <i class="bi bi-arrow-left"></i> Kembali ke Situs
            </a>
        </div>
    </aside>

    <div class="admin-main">
        <div class="admin-topbar">
            <h5>@yield('title')</h5>
            <span class="admin-user"><strong>{{ Auth::user()->name }}</strong> (Admin)</span>
        </div>

        <div class="admin-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

</body>
</html>