@extends('all.super_admin')

@section('header', 'Manajemen Pengguna')
@section('subheader', 'Kelola seluruh akun pengguna sistem')

@section('content')

{{-- FLASH MESSAGE --}}
@if (session('success'))
<div class="mb-6 flex items-center gap-3 p-4
            bg-green-500/10 border border-green-500/30
            text-green-400 rounded-2xl">
    <span class="text-xl">✅</span>
    <span>{{ session('success') }}</span>
</div>
@endif

{{-- HEADER ACTION --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-white">Daftar Pengguna</h2>
        <p class="text-sm text-gray-400">Total: {{ $users->count() }} pengguna</p>
    </div>

    <a href="{{ route('super.admin.users.create') }}"
       class="flex items-center gap-2 px-5 py-2.5
              bg-indigo-600 hover:bg-indigo-500
              rounded-xl font-semibold transition shadow">
        <span class="text-lg">➕</span>
        Tambah User
    </a>
</div>

{{-- TABLE --}}
<div class="bg-gray-900/70 backdrop-blur
            rounded-2xl border border-gray-700
            overflow-hidden shadow-xl">

<table class="w-full text-left">
    <thead class="bg-gray-800/80 text-gray-300 text-sm uppercase">
        <tr>
            <th class="p-4">#</th>
            <th class="p-4">Pengguna</th>
            <th class="p-4">Role</th>
            <th class="p-4">Tanggal Daftar</th>
            <th class="p-4 text-center">Aksi</th>
        </tr>
    </thead>

    <tbody>
    @forelse ($users as $user)
        <tr class="border-t border-gray-700
                   hover:bg-gray-800/50 transition">

            <td class="p-4 text-gray-400">
                {{ $loop->iteration }}
            </td>

            {{-- USER INFO --}}
            <td class="p-4">
                <div class="flex flex-col">
                    <span class="font-semibold text-white">
                        {{ $user->name }}
                    </span>
                    <span class="text-sm text-gray-400">
                        {{ $user->email }}
                    </span>
                </div>
            </td>

            {{-- ROLE --}}
            <td class="p-4 capitalize">
                <span class="inline-flex items-center px-3 py-1
                    rounded-full text-xs font-semibold
                    {{ $user->role === 'super admin'
                        ? 'bg-red-500/20 text-red-400'
                        : ($user->role === 'admin'
                            ? 'bg-indigo-500/20 text-indigo-400'
                            : 'bg-gray-500/20 text-gray-300') }}">
                    {{ $user->role }}
                </span>
            </td>

            {{-- DATE --}}
            <td class="p-4 text-gray-400 text-sm">
                {{ $user->created_at->format('d M Y') }}
            </td>

            {{-- ACTION --}}
            <td class="p-4">
                <div class="flex justify-center gap-2">

                    <a href="{{ route('super.admin.users.edit', $user) }}"
                       class="p-2 rounded-lg
                              bg-yellow-500/20 text-yellow-400
                              hover:bg-yellow-500/30 transition"
                       title="Edit">
                        ✏️
                    </a>

                    <form method="POST"
                          action="{{ route('super.admin.users.destroy', $user) }}"
                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button
                            class="p-2 rounded-lg
                                   bg-red-500/20 text-red-400
                                   hover:bg-red-500/30 transition"
                            title="Hapus">
                            🗑️
                        </button>
                    </form>

                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="p-10 text-center text-gray-400">
                <div class="flex flex-col items-center gap-3">
                    <span class="text-4xl">👤</span>
                    <span class="font-semibold">Belum ada pengguna</span>
                    <span class="text-sm">Silakan tambahkan user baru</span>
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

</div>
@endsection
