@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-geo-alt"></i></div>
        <div class="stat-label">Total Destinasi</div>
        <div class="stat-value">{{ $totalDestinasi }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-stars"></i></div>
        <div class="stat-label">Total Atraksi</div>
        <div class="stat-value">{{ $totalAtraksi }}</div>
    </div>

    <div class="stat-card is-gold">
        <div class="stat-icon"><i class="bi bi-people"></i></div>
        <div class="stat-label">Total User</div>
        <div class="stat-value">{{ $totalUser }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-chat-square-text"></i></div>
        <div class="stat-label">Total Ulasan</div>
        <div class="stat-value">{{ $totalUlasan }}</div>
    </div>
</div>

<div class="quick-actions-head">
    <h6>Akses Cepat</h6>
    <span>Pintas ke halaman pengelolaan</span>
</div>

<div class="quick-actions-grid">
    <a href="{{ route('destinasi') }}" class="quick-action-card">
        <div class="stat-icon"><i class="bi bi-geo-alt"></i></div>
        <div class="quick-action-title">Destinasi</div>
        <div class="quick-action-desc">Tambah, ubah, atau hapus data destinasi wisata.</div>
        <div class="quick-action-go">Kelola <i class="bi bi-arrow-right"></i></div>
    </a>

    <a href="{{ route('atraksi') }}" class="quick-action-card">
        <div class="stat-icon"><i class="bi bi-stars"></i></div>
        <div class="quick-action-title">Atraksi</div>
        <div class="quick-action-desc">Perbarui daftar atraksi dan kegiatan wisata.</div>
        <div class="quick-action-go">Kelola <i class="bi bi-arrow-right"></i></div>
    </a>

    <a href="{{ route('user') }}" class="quick-action-card">
        <div class="stat-icon"><i class="bi bi-people"></i></div>
        <div class="quick-action-title">User</div>
        <div class="quick-action-desc">Atur akun dan peran (role) pengguna sistem.</div>
        <div class="quick-action-go">Kelola <i class="bi bi-arrow-right"></i></div>
    </a>

    <div class="quick-action-card" style="opacity:.55; pointer-events:none;">
        <div class="stat-icon"><i class="bi bi-chat-square-text"></i></div>
        <div class="quick-action-title">Ulasan</div>
        <div class="quick-action-desc">Belum ada halaman pengelolaan ulasan.</div>
        <div class="quick-action-go">Segera</div>
    </div>
</div>

@endsection