@extends('layouts.app')

@section('title', 'Edit ' . $user->name)

@section('content')

<div class="page-header-section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ $user->name }}</li>
        </ol>
    </nav>
    <h1 class="page-header-title">Edit User</h1>
    <p class="page-header-subtitle">Perbarui data akun {{ $user->name }}.</p>
</div>

<div class="admin-form-section">
    <div class="admin-form-card">
        <div class="admin-form-topbar"></div>

        <div class="admin-form-body">
            @php
                $initials = collect(explode(' ', $user->name))
                    ->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))
                    ->take(2)
                    ->implode('');
            @endphp

            <div class="admin-form-header">
                <div class="admin-form-avatar">{{ $initials }}</div>
                <div>
                    <p class="admin-form-title">{{ $user->name }}</p>
                    <p class="admin-form-subtitle">{{ $user->email }}</p>
                </div>
            </div>

            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="form-text">Kosongkan kalau tidak ingin mengubah password.</div>
                </div>

                <div class="mb-2">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <div class="admin-form-actions">
                    <button type="submit" class="btn-form-save">Simpan Perubahan</button>
                    <a href="{{ route('user') }}" class="btn-form-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection