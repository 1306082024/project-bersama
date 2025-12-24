@extends('admin.admin')

@section('header','Edit Pesanan Makanan')
@section('subheader','Perbarui data pesanan')

@section('content')
<div class="max-w-2xl">

<form method="POST"
      action="{{ route('admin.food-orders.update', $foodOrder) }}"
      class="bg-gray-900/70 p-6 rounded-2xl border border-gray-700 space-y-4">
    @csrf
    @method('PUT')

    {{-- No Kamar --}}
    <div>
        <label class="block mb-1 text-sm">No Kamar</label>
        <select name="room_id"
                class="w-full rounded bg-gray-800 border border-gray-600 p-2">
            @foreach($rooms as $room)
                <option value="{{ $room->id }}"
                    {{ old('room_id', $foodOrder->room_id) == $room->id ? 'selected' : '' }}>
                    {{ $room->no_kamar }} - {{ $room->tipe_kamar }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Detail Pesanan --}}
    <div>
        <label class="block mb-1 text-sm">Detail Pesanan</label>
        <textarea name="detail_pesanan"
                  rows="4"
                  class="w-full rounded bg-gray-800 border border-gray-600 p-2">{{ old('detail_pesanan', $foodOrder->detail_pesanan) }}</textarea>
    </div>

    {{-- Total --}}
    <div>
        <label class="block mb-1 text-sm">Total (Rp)</label>
        <input type="number"
               name="total"
               value="{{ old('total', $foodOrder->total) }}"
               class="w-full rounded bg-gray-800 border border-gray-600 p-2">
    </div>

    {{-- Waktu Pesan --}}
    <div>
        <label class="block mb-1 text-sm">Waktu Pesan</label>
        <input type="datetime-local"
               name="waktu_pesan"
               value="{{ old('waktu_pesan', \Carbon\Carbon::parse($foodOrder->waktu_pesan)->format('Y-m-d\TH:i')) }}"
               class="w-full rounded bg-gray-800 border border-gray-600 p-2">
    </div>

    {{-- Status --}}
    <div>
        <label class="block mb-1 text-sm">Status</label>
        <select name="status"
                class="w-full rounded bg-gray-800 border border-gray-600 p-2">
            <option value="pending" {{ $foodOrder->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="diproses" {{ $foodOrder->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $foodOrder->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>

    {{-- Tombol --}}
    <div class="flex gap-3 pt-4">
        <button class="bg-indigo-600 px-4 py-2 rounded">
            Update
        </button>

        <a href="{{ route('admin.food-orders.index') }}"
           class="px-4 py-2 rounded border border-gray-600">
           Batal
        </a>
    </div>

</form>

</div>
@endsection
