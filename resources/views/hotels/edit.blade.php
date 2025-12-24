@extends('all.super_admin')

@section('header', 'Edit Hotel')
@section('subheader', 'Perbarui informasi hotel')

@section('content')

<div class="max-w-3xl mx-auto">

    <form method="POST"
          action="{{ route('super.admin.hotels.update', $hotel) }}"
          class="bg-gray-900/80 border border-gray-700 rounded-2xl p-8 space-y-6 shadow-xl">
        @csrf
        @method('PUT')

        <!-- NAMA HOTEL -->
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-300">
                Nama Hotel
            </label>
            <input type="text"
                   name="nama_hotel"
                   value="{{ old('nama_hotel', $hotel->nama_hotel) }}"
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            @error('nama_hotel')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- ALAMAT -->
        <div>
            <label class="block mb-2 text-sm font-semibold text-gray-300">
                Alamat Hotel
            </label>
            <textarea name="alamat"
                      rows="3"
                      class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                             focus:ring-2 focus:ring-indigo-500 focus:outline-none">{{ old('alamat', $hotel->alamat) }}</textarea>
            @error('alamat')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- AKSI -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('super.admin.hotels.index') }}"
               class="px-6 py-3 rounded-xl bg-gray-700 hover:bg-gray-600 transition">
                Batal
            </a>

            <button
                class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500
                       font-semibold shadow-lg transition">
                💾 Update Hotel
            </button>
        </div>

    </form>

</div>

@endsection
