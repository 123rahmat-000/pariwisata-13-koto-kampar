<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kabupaten Siak - Wisata')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-tree-fill me-2"></i>XIII Koto Kampar
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('destinasi') ? 'active' : '' }}" href="{{ route('destinasi') }}">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>

                @guest
              <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
              <a href="{{ route('register') }}" class="btn btn-light btn-sm">Daftar</a>
              @else
                <div class="dropdown">
              <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              href="#" data-bs-toggle="dropdown">
             <span class="rounded-circle bg-light text-dark d-flex align-items-center justify-content-center fw-bold"
                  style="width:32px;height:32px;">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
             </span>
             </a>
             <ul class="dropdown-menu dropdown-menu-end">
            <li><span class="dropdown-item-text fw-bold">{{ Auth::user()->name }}</span></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
@endguest

            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col">
            <h4><i class="bi bi-tree-fill me-2"></i>13 Koto Kampar</h4>
            <p>Jelajahi pesona alam dan budaya Melayu di jantung Kabupaten Kampar, Riau.</p>
        </div>

        <div class="footer-col">
            <h4>Tautan Cepat</h4>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="#">Destinasi</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Hubungi Kami</h4>
            <p><i class="bi bi-geo-alt-fill me-2"></i>Koto Kampar, Riau, Indonesia</p>
            <p><i class="bi bi-envelope-fill me-2"></i>info@wisatakampar.id</p>
            <div class="social-icons mt-2">
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="https://www.facebook.com/rahmat.hidayad.188"><i class="bi bi-facebook"></i></a>
                <a href=" https://wa.me/message/UCTPE424KKWCE1"><i class="bi bi-whatsapp"></i></a>
                <a href="#"><i class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>

    <p class="footer-copy">&copy; {{ date('Y') }} Wisata 13 Koto Kampar. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>