@extends('admin.admin')

@section('header', 'Kelola Ruangan')
@section('subheader', 'Tambah Ruangan dan Kelola Ruangan yang ada')

@section('content')

<a href="{{ route('admin.rooms.create') }}"
   class="mb-6 inline-block px-5 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg font-semibold">
   + Tambah Ruangan
</a>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

@foreach ($rooms as $room)

@php
    $isOccupied = $room->status === 'terisi';

    $cardColor = match($room->status) {
        'terisi' => 'from-green-600/30 to-green-400/20 border-green-500/40 text-white',
        'maintenance' => 'from-yellow-600/30 to-yellow-400/20 border-yellow-500/40 text-white',
        default => 'from-gray-100 to-white border-gray-300 text-gray-900'
    };
@endphp

<div
    class="relative rounded-2xl p-6 border bg-gradient-to-br {{ $cardColor }}
           shadow-lg hover:scale-[1.03] transition-all duration-300">

    {{-- CARD CLICKABLE --}}
    <a href="{{ route('admin.rooms.show', $room) }}"
       class="absolute inset-0 rounded-2xl"></a>

    <!-- NO KAMAR -->
    <h2 class="relative z-10 text-4xl font-extrabold mb-2">
        {{ $room->no_kamar }}
    </h2>

    <!-- TIPE -->
    <p class="relative z-10 mb-3 opacity-80">
        Tipe: <span class="font-semibold">{{ $room->tipe_kamar }}</span>
    </p>

    <!-- STATUS -->
    <span class="relative z-10 inline-block mb-4 px-4 py-1 rounded-full text-sm font-semibold
        {{ $room->status == 'kosong' ? 'bg-gray-200 text-gray-700' : '' }}
        {{ $room->status == 'terisi' ? 'bg-green-500/20 text-green-400' : '' }}
        {{ $room->status == 'maintenance' ? 'bg-yellow-500/20 text-yellow-400' : '' }}">
        {{ ucfirst($room->status) }}
    </span>

    {{-- INFO TAMU --}}
    @if ($isOccupied && $room->guest)
        <div class="relative z-10 mt-4 space-y-2 text-sm">

            <div class="flex justify-between">
                <span class="opacity-70">Nama Tamu</span>
                <span class="font-semibold">
                    {{ $room->guest->nama_tamu }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="opacity-70">ID Perangkat</span>
                <span class="font-semibold text-cyan-400">
                    {{ $room->guest->device_id }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="opacity-70">Check-in</span>
                <span class="opacity-90">
                    {{ \Carbon\Carbon::parse($room->guest->check_in)->format('d M Y H:i') }}
                </span>
            </div>

        </div>
    @else
        <p class="relative z-10 mt-4 italic text-sm opacity-60">
            💤 Belum ada tamu
        </p>
    @endif

    <!-- ACTION -->
    <div class="relative z-10 flex gap-3 mt-6">
        <a href="{{ route('admin.rooms.edit', $room) }}"
           class="flex-1 text-center px-3 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg">
            Edit
        </a>

        <form method="POST"
              action="{{ route('admin.rooms.destroy', $room) }}"
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
