@extends('all.super_admin')

@section('header', 'Kelola Ruangan')
@section('subheader', 'Tambah Ruangan dan Kelola Ruangan yang ada')

@section('content')

<a href="{{ route('super.admin.rooms.create') }}"
   class="mb-6 inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg font-semibold">
   + Tambah Ruangan
</a>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

@foreach ($rooms as $room)

@php
    $cardColor = match($room->status) {
        'terisi' => 'from-green-600/30 to-green-400/20 border-green-500/40',
        'maintenance' => 'from-yellow-600/30 to-yellow-400/20 border-yellow-500/40',
        default => 'from-gray-800 to-gray-900 border-gray-700'
    };
@endphp

<div
    class="rounded-2xl p-6 border bg-gradient-to-br {{ $cardColor }}
           shadow-lg hover:scale-[1.02] transition-all duration-300">

    <!-- NO KAMAR -->
    <h2 class="text-4xl font-extrabold mb-2">
        {{ $room->no_kamar }}
    </h2>

    <!-- TIPE -->
    <p class="text-gray-300 mb-4">
        Tipe: <span class="font-semibold">{{ $room->tipe_kamar }}</span>
    </p>

    <!-- STATUS -->
    <span class="inline-block mb-5 px-4 py-1 rounded-full text-sm font-semibold
        {{ $room->status == 'kosong' ? 'bg-gray-700 text-gray-200' : '' }}
        {{ $room->status == 'terisi' ? 'bg-green-500/20 text-green-400' : '' }}
        {{ $room->status == 'maintenance' ? 'bg-yellow-500/20 text-yellow-400' : '' }}">
        {{ ucfirst($room->status) }}
    </span>

    <!-- ACTION -->
    <div class="flex gap-3 mt-4">
        <a href="{{ route('super.admin.rooms.edit', $room) }}"
           class="flex-1 text-center px-3 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg">
            Edit
        </a>

        <form method="POST"
              action="{{ route('super.admin.rooms.destroy', $room) }}"
              class="flex-1">
            @csrf
            @method('DELETE')
            <button
                onclick="return confirm('Yakin hapus ruangan ini?')"
                class="w-full px-3 py-2 bg-red-600 hover:bg-red-500 rounded-lg">
                Hapus
            </button>
        </form>
    </div>

</div>

@endforeach

</div>

@endsection
