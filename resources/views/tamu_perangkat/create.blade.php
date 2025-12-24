@extends('all.super_admin')

@section('header', 'Tambah Tamu')
@section('subheader', 'Input data tamu dan perangkat')

@section('content')
<div class="max-w-xl bg-gray-900/70 p-6 rounded-2xl border border-gray-700">

    <form method="POST" action="{{ route('super.admin.guests.store') }}" class="space-y-5">
        @csrf

        <!-- NAMA TAMU -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">Nama Tamu</label>
            <input type="text" name="nama_tamu"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600"
                placeholder="Contoh: Budi Santoso"
                value="{{ old('nama_tamu') }}">
        </div>

        <!-- NO KAMAR -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">No. Kamar</label>
            <select name="room_id" id="room_id"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600">
                @foreach($rooms as $room)
                <option value=""
                    {{ $guest->room_id == $room->id ? 'selected' : '' }}>
                    {{ $room->no_kamar }} ({{ $room->tipe_kamar }})
                </option>
                @endforeach
            </select>
        </div>


        <!-- ID PERANGKAT -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">ID Perangkat TV</label>
            <input type="text" name="device_id"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600"
                placeholder="TV-ROOM-101">
        </div>

        <!-- CHECK IN -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">Waktu Check-in</label>
            <input type="datetime-local" name="check_in"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('super.admin.guests.index') }}"
                class="px-4 py-2 rounded bg-gray-700">Batal</a>

            <button class="px-5 py-2 rounded bg-indigo-600 hover:bg-indigo-500">
                Simpan
            </button>
        </div>

    </form>
</div>
@endsection