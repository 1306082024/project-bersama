@extends('all.super_admin')

@section('header', 'Daftar Pengguna')
@section('subheader', 'Data seluruh pengguna sistem')

@section('content')

{{-- FLASH MESSAGE --}}
@if (session('success'))
    <div class="mb-6 p-4 bg-green-500/20 text-green-400 rounded-xl border border-green-500/30">
        {{ session('success') }}
    </div>
@endif

{{-- TOMBOL TAMBAH USER --}}
<div class="flex justify-end mb-5">
    <a href="{{ route('users.create') }}"
       class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold transition">
        ➕ Tambah User
    </a>
</div>

{{-- TABLE --}}
<div class="bg-gray-900/70 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">

    <table class="w-full text-left">
        <thead class="bg-gray-800 text-gray-300">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Nama</th>
                <th class="p-4">Email</th>
                <th class="p-4">Role</th>
                <th class="p-4">Tanggal Daftar</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
            <tr class="border-t border-gray-700 hover:bg-gray-800/50 transition">
                <td class="p-4">{{ $loop->iteration }}</td>

                <td class="p-4 font-semibold text-gray-100">
                    {{ $user->name }}
                </td>

                <td class="p-4 text-gray-300">
                    {{ $user->email }}
                </td>

                <td class="p-4 capitalize">
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        {{ $user->role === 'super admin'
                            ? 'bg-red-500/20 text-red-400'
                            : ($user->role === 'admin'
                                ? 'bg-indigo-500/20 text-indigo-400'
                                : 'bg-gray-500/20 text-gray-300') }}">
                        {{ $user->role }}
                    </span>
                </td>

                <td class="p-4 text-gray-400">
                    {{ $user->created_at->format('d M Y') }}
                </td>

                <td class="p-4 text-center">
                    <div class="flex justify-center gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('users.edit', $user) }}"
                           class="px-4 py-2 bg-yellow-500/20 text-yellow-400 
                                  rounded-lg hover:bg-yellow-500/30 transition">
                            ✏️ Edit
                        </a>

                        {{-- DELETE --}}
                        <form method="POST" action="{{ route('users.destroy', $user) }}"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-4 py-2 bg-red-500/20 text-red-400 
                                       rounded-lg hover:bg-red-500/30 transition">
                                🗑️ Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-400">
                    Tidak ada data pengguna
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
