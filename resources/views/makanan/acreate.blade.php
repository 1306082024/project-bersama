@extends('admin.admin')

@section('header','Tambah Pesanan Makanan')
@section('subheader','Input pesanan makanan tamu')

@section('content')
<div class="max-w-2xl">

<form method="POST" action="{{ route('admin.food-orders.store') }}"
      class="bg-gray-900/70 p-6 rounded-2xl border border-gray-700 space-y-4">
    @csrf

    {{-- No Kamar --}}
    <div>
        <label class="block mb-1 text-sm">No Kamar</label>
        <select name="room_id"
                class="w-full rounded bg-gray-800 border border-gray-600 p-2">
            <option value="">-- Pilih Kamar --</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}"
                    {{ old('room_id') == $room->id ? 'selected' : '' }}>
                    {{ $room->no_kamar }} - {{ $room->tipe_kamar }}
                </option>
            @endforeach
        </select>
        @error('room_id')
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Detail Pesanan --}}
    <div>
        <label class="block mb-1 text-sm">Detail Pesanan</label>
        <textarea name="detail_pesanan"
                  rows="4"
                  class="w-full rounded bg-gray-800 border border-gray-600 p-2"
                  placeholder="Contoh: Nasi goreng, Es teh manis">{{ old('detail_pesanan') }}</textarea>
        @error('detail_pesanan')
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Total --}}
    <div>
        <label class="block mb-1 text-sm">Total (Rp)</label>
        <input type="number"
               name="total"
               value="{{ old('total') }}"
               class="w-full rounded bg-gray-800 border border-gray-600 p-2"
               placeholder="50000">
        @error('total')
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Waktu Pesan --}}
    <div>
        <label class="block mb-1 text-sm">Waktu Pesan</label>
        <input type="datetime-local"
               name="waktu_pesan"
               value="{{ old('waktu_pesan') }}"
               class="w-full rounded bg-gray-800 border border-gray-600 p-2">
        @error('waktu_pesan')
            <p class="text-red-400 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status --}}
    <div>
        <label class="block mb-1 text-sm">Status</label>
        <select name="status"
                class="w-full rounded bg-gray-800 border border-gray-600 p-2">
            <option value="pending">Pending</option>
            <option value="diproses">Diproses</option>
            <option value="selesai">Selesai</option>
        </select>
    </div>

    {{-- Tombol --}}
    <div class="flex gap-3 pt-4">
        <button class="bg-indigo-600 px-4 py-2 rounded">
            Simpan
        </button>

        <a href="{{ route('admin.food-orders.index') }}"
           class="px-4 py-2 rounded border border-gray-600">
           Batal
        </a>
    </div>

</form>

</div>
@endsection
