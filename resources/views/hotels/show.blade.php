@extends('all.super_admin')

@section('header', $hotel->nama_hotel)
@section('subheader', 'Daftar Ruangan')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach($hotel->rooms as $room)

<div class="rounded-2xl p-5
    {{ $room->status === 'terisi'
        ? 'bg-green-700/30'
        : 'bg-white text-gray-800' }}">

    <h2 class="text-2xl font-bold mb-2">
        Kamar {{ $room->no_kamar }}
    </h2>

    <p class="text-sm mb-2">
        Tipe: <b>{{ $room->tipe_kamar }}</b>
    </p>

    <span class="inline-block px-3 py-1 rounded-full text-xs mb-3
        {{ $room->status === 'terisi'
            ? 'bg-green-500/20 text-green-300'
            : 'bg-gray-200 text-gray-600' }}">
        {{ ucfirst($room->status) }}
    </span>

    @if($room->guest)
        <div class="text-sm space-y-1 mt-2">
            <p>👤 {{ $room->guest->nama_tamu }}</p>
            <p>📅 Check-in: {{ $room->guest->check_in }}</p>
            <p>📺 Device ID: {{ $room->guest->device_id }}</p>
        </div>
    @else
        <p class="text-sm text-gray-400 mt-2">
            💤 Kamar kosong
        </p>
    @endif

</div>

@endforeach

</div>

@endsection
