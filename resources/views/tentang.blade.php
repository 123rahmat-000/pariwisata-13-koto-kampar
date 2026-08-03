@extends('layouts.app')

@section('title', 'XIII Koto Kampar - Tentang')

@section('content')

<section class="page-header-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang</li>
            </ol>
        </nav>

        <h1 class="page-header-title">Tentang XIII Koto Kampar</h1>
        <p class="page-header-subtitle">
            Mengenal lebih jauh sejarah, kekayaan alam, dan budaya yang menjadikan daerah kami istimewa.
        </p>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="about-img-wrapper">
                    <img src="{{ asset('images/candi.jpg') }}" alt="Sejarah XIII Koto Kampar" class="about-img">
                    <div class="about-img-badge">
                        <i class="bi bi-clock-history"></i>
                        <span>Kaya Sejarah & Budaya</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="section-label">Sejarah Kami</span>
                <h2 class="about-title">Jejak Panjang XIII Koto Kampar</h2>
                <p class="about-text">
                    XIII Koto Kampar merupakan kawasan yang menyimpan jejak sejarah panjang, mulai dari peninggalan kerajaan Melayu hingga kekayaan adat istiadat yang masih dijaga hingga kini. Nama "XIII Koto" sendiri berasal dari tiga belas kampung tua yang menjadi cikal bakal perkembangan daerah ini.
                </p>
                <p class="about-text">
                    Selain menyimpan nilai sejarah, daerah ini juga dikaruniai bentang alam yang memukau — mulai dari perbukitan hijau, aliran sungai, hingga danau yang menjadi sumber kehidupan masyarakat setempat selama bergenerasi.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="visi-misi-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Arah Kami</span>
            <h2 class="about-title">Visi & Misi</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="visi-misi-card">
                    <div class="visi-misi-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <h5>Visi</h5>
                    <p>
                        Menjadikan XIII Koto Kampar sebagai destinasi wisata alam, sejarah, dan budaya unggulan di Provinsi Riau yang berkelanjutan dan memberi manfaat bagi masyarakat setempat.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="visi-misi-card">
                    <div class="visi-misi-icon">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <h5>Misi</h5>
                    <ul class="visi-misi-list">
                        <li>Melestarikan situs sejarah dan budaya lokal.</li>
                        <li>Mengembangkan infrastruktur wisata yang ramah lingkungan.</li>
                        <li>Memberdayakan masyarakat melalui sektor pariwisata.</li>
                        <li>Mempromosikan potensi wisata daerah secara luas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="statistik-section">
    <div class="container">
        <div class="row g-4 text-center">

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-signpost-split-fill"></i>
                    <h3>13</h3>
                    <p>Koto/Kampung Tua</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-map-fill"></i>
                    <h3>±935 km²</h3>
                    <p>Luas Wilayah</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h3>10+</h3>
                    <p>Destinasi Wisata</p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="statistik-card">
                    <i class="bi bi-people-fill"></i>
                    <h3>±90.000</h3>
                    <p>Jumlah Penduduk</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="budaya-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">Warisan Kami</span>
            <h2 class="about-title">Keunikan Budaya & Adat</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/Tradisi Makan Bajambau.jpeg') }}" alt="Adat Istiadat Melayu">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Adat Istiadat</h5>
                        <p>Makan Bajambau Tradisi ini melibatkan cara duduk melingkar penyajian menu khas serta nilai keaktifan sosial</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/Gondang Oguong 13 Koto Kampar_jpg.webp') }}" alt="Kesenian Tradisional">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Kesenian Tradisional</h5>
                        <p> Calempong Oguong Tari dan musik tradisional yang rutin ditampilkan pada acara-acara adat dan penyambutan tamu.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="budaya-card">
                    <div class="budaya-card-img-wrap">
                        <img src="{{ asset('images/Lopek Bugi.jpg') }}" alt="Kuliner Khas">
                    </div>
                    <div class="budaya-card-body">
                        <h5>Kuliner Khas</h5>
                        <p>Lopek bugi salah satu ragam masakan khas yang diwariskan turun-temurun, jadi daya tarik tersendiri bagi wisatawan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection