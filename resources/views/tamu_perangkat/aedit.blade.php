@extends('admin.admin')

@section('header', 'Edit Tamu')
@section('subheader', 'Perbarui data tamu dan perangkat')

@section('content')
<div class="max-w-xl bg-gray-900/70 p-6 rounded-2xl border border-gray-700">

    <form method="POST"
        action="{{ route('admin.guests.update', $guest) }}"
        class="space-y-5">
        @csrf
        @method('PUT')

        <!-- NAMA TAMU -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">Nama Tamu</label>
            <input type="text" name="nama_tamu"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600"
                value="{{ $guest->nama_tamu }}">
        </div>

        <div>
            <label class="block mb-1 text-sm text-gray-400">Hotel</label>
            <select id="hotel_id"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600">
                @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}"
                    {{ $guest->room->hotel_id == $hotel->id ? 'selected' : '' }}>
                    {{ $hotel->nama_hotel }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- NO KAMAR -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">No. Kamar</label>
            <select name="room_id" id="room_id"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600">
                @foreach($rooms as $room)
                <option value="{{ $room->id }}"
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
                value="{{ $guest->device_id }}">
        </div>

        <!-- CHECK IN -->
        <div>
            <label class="block mb-1 text-sm text-gray-400">Waktu Check-in</label>
            <input type="datetime-local" name="check_in"
                value="{{ \Carbon\Carbon::parse($guest->check_in)->format('Y-m-d\TH:i') }}"
                class="w-full px-4 py-2 rounded bg-gray-800 border border-gray-600">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.guests.index') }}"
                class="px-4 py-2 rounded bg-gray-700">Batal</a>

            <button class="px-5 py-2 rounded bg-indigo-600 hover:bg-indigo-500">
                Update
            </button>
        </div>

    </form>
    <script>
        document.getElementById('hotel_id').addEventListener('change', function() {
            const hotelId = this.value;
            const roomSelect = document.getElementById('room_id');

            roomSelect.innerHTML = '<option>Loading...</option>';

            fetch(`/admin/hotels/${hotelId}/rooms`)
                .then(res => res.json())
                .then(data => {
                    roomSelect.innerHTML = '';
                    data.forEach(room => {
                        roomSelect.innerHTML +=
                            `<option value="${room.id}">
                        ${room.no_kamar} (${room.tipe_kamar})
                    </option>`;
                    });
                });
        });
    </script>

</div>
@endsection