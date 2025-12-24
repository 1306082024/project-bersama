@extends('admin.admin')

@section('header', 'Tambah Ruangan')
@section('subheader', 'Tambahkan ruangan hotel baru')

@section('content')

<div class="max-w-xl">

<form method="POST"
      action="{{ route('admin.rooms.store') }}"
      class="bg-gray-900/80 border border-gray-700
             p-8 rounded-2xl space-y-6 shadow-xl">
    @csrf

    <!-- NO KAMAR -->
    <div>
        <label class="block mb-1 text-sm text-gray-400">
            No. Kamar
        </label>
        <input type="text"
               name="no_kamar"
               value="{{ old('no_kamar') }}"
               placeholder="Contoh: 101"
               class="w-full p-3 rounded-xl bg-gray-800
                      border border-gray-700 focus:ring-2
                      focus:ring-indigo-500 outline-none">
        @error('no_kamar')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- TIPE KAMAR -->
    <div>
        <label class="block mb-1 text-sm text-gray-400">
            Tipe Kamar
        </label>
        <input type="text"
               name="tipe_kamar"
               value="{{ old('tipe_kamar') }}"
               placeholder="Standard / Deluxe / Suite"
               class="w-full p-3 rounded-xl bg-gray-800
                      border border-gray-700 focus:ring-2
                      focus:ring-indigo-500 outline-none">
        @error('tipe_kamar')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- STATUS -->
    <div>
        <label class="block mb-2 text-sm text-gray-400">
            Status Ruangan
        </label>
        <select name="status"
                class="w-full p-3 rounded-xl bg-gray-800
                       border border-gray-700 focus:ring-2
                       focus:ring-indigo-500 outline-none">
            <option value="kosong" {{ old('status') == 'kosong' ? 'selected' : '' }}>
                🟢 Kosong
            </option>
            <option value="terisi" {{ old('status') == 'terisi' ? 'selected' : '' }}>
                🔴 Terisi
            </option>
            <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                🟡 Maintenance
            </option>
        </select>
        @error('status')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- ACTION -->
    <div class="flex gap-4 pt-4">
        <a href="{{ route('admin.rooms.index') }}"
           class="px-5 py-2 rounded-xl bg-gray-700 hover:bg-gray-600 transition">
            Batal
        </a>

        <button
            class="px-6 py-2 rounded-xl bg-indigo-600
                   hover:bg-indigo-500 font-semibold transition">
            💾 Simpan Ruangan
        </button>
    </div>

</form>

</div>

@endsection
