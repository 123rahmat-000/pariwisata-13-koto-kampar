@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')

<div class="page-header-section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>
    <h1 class="page-header-title">Daftar User</h1>
    <p class="page-header-subtitle">Kelola akses admin dan pengguna situs XIII Koto Kampar.</p>
</div>

<div class="admin-toolbar">
    <p>{{ $userList->count() }} akun terdaftar</p>
    <a href="{{ route('user.create') }}" class="btn-add-user">
        <i class="bi bi-plus-lg"></i> Tambah User
    </a>
</div>

<div class="admin-table-section">
    <div class="admin-table-card">
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userList as $user)
                        @php
                            $isAdmin = $user->role === 'admin';
                            $initials = collect(explode(' ', $user->name))
                                ->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))
                                ->take(2)
                                ->implode('');
                        @endphp
                        <tr>
                            <td>
                                <div class="admin-user-cell">
                                    <div class="admin-avatar {{ $isAdmin ? 'is-admin' : '' }}">{{ $initials }}</div>
                                    <span class="admin-uname">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="admin-uemail">{{ $user->email }}</td>
                            <td>
                                <span class="role-badge {{ $isAdmin ? 'role-badge-admin' : 'role-badge-user' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="admin-actions">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-table-edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus {{ $user->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-table-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="admin-table-empty">
                                Belum ada user yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection