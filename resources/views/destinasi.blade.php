@extends('layouts.app')

@section('title', 'XIII Koto Kampar - Destinasi')

@section('content')

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Destinasi</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Destinasi Wisata XIII Koto Kampar</h1>
        <p class="page-header-subtitle">
            Temukan pesona alam, sejarah, dan budaya yang tersebar di seluruh penjuru XIII Koto Kampar.
        </p>
    </div>

    <div class="destinasi-search-wrap">
        <form action="{{ route('destinasi') }}" method="GET">
            <div class="destinasi-search-box">
                <i class="bi bi-search"></i>
                <input type="text" name="cari" placeholder="Cari nama destinasi..." value="{{ $keyword ?? '' }}">
                <button type="submit">Cari</button>
            </div>
        </form>
    </div>
</section>

<section class="filter-section">
    <div class="container">
        <ul class="nav filter-tabs justify-content-center flex-wrap">
            <li class="nav-item">
                <a class="nav-link filter-tab active" href="#">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Alam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Sejarah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-tab" href="#">Wisata Air</a>
            </li>
        </ul>
    </div>
</section>

<section class="destinasi-grid-section">
    <div class="container">

        <div class="row g-4">

            @forelse ($destinasiList as $destinasi)

                @php
                    date_default_timezone_set("Asia/Jakarta");
                    // Hitung status buka/tutup per destinasi berdasarkan jam_buka & jam_tutup di database
                    $jamSekarang   = date('H:i:s');
                    $jamBuka       = $destinasi->jam_buka;
                    $jamTutup      = $destinasi->jam_tutup;

                    if ($jamSekarang >= $jamBuka && $jamSekarang < $jamTutup) {
                        $status = 'Sedang Buka';
                    } else {
                        $status = 'Sudah Tutup';
                    }
                @endphp

                <div class="col-md-6 col-lg-4">
                    <div class="destinasi-full-card">
                        <div class="destinasi-full-card-img-wrap">
                            <img src="{{ asset('images/' . $destinasi->gambar) }}" alt="{{ $destinasi->nama }}">
                            <span class="status-badge {{ $status == 'Sedang Buka' ? 'status-buka' : 'status-tutup' }}">
                                {{ $status }}
                            </span>
                            <span class="category-badge">Wisata Alam</span>
                        </div>

                        <div class="destinasi-full-card-body">
                            <h5>{{ $destinasi->nama }}</h5>
                            <p class="destinasi-full-desc">
                                {{ Str::limit($destinasi->deskripsi, 150) }}
                            </p>
                            <div class="destinasi-full-meta">
                                <i class="bi bi-clock"></i>
                                {{ substr($destinasi->jam_buka, 0, 5) }} - {{ substr($destinasi->jam_tutup, 0, 5) }} WIB
                            </div>

                            <a href="{{ route('destinasi.detail', $destinasi->id) }}" class="btn btn-detail-card">
                                Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12 text-center">
                    <p>Belum ada data destinasi wisata.</p>
                </div>

            @endforelse

        </div>
        <div class="d-flex justify-content-center mt-4 destinasi-pagination-wrap">
            {{ $destinasiList->appends(['cari' => $keyword])->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

<section class="destinasi-cta-section">
    <div class="container text-center">
        <h3 class="destinasi-cta-title">Masih Bingung Mau Mulai Dari Mana?</h3>
        <p class="destinasi-cta-text">
            Tim kami siap membantu merencanakan kunjungan wisata Anda ke XIII Koto Kampar.
        </p>
        <a href="{{ url('/#kontak') }}" class="btn btn-hero-primary">
            Hubungi Kami <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</section>

@endsection