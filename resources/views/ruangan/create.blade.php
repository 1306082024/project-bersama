@extends('all.super_admin')

@section('header', 'Tambah Ruangan')

@section('content')
<form method="POST" action="{{ route('super.admin.rooms.store') }}"
      class="bg-gray-900 p-6 rounded-xl space-y-4">
    @csrf

    <input type="text" name="no_kamar"
        placeholder="No Kamar"
        class="w-full p-3 rounded bg-gray-800">

    <input type="text" name="tipe_kamar"
        placeholder="Tipe Kamar"
        class="w-full p-3 rounded bg-gray-800">

    <select name="status" class="w-full p-3 rounded bg-gray-800">
        <option value="kosong">Kosong</option>
        <option value="terisi">Terisi</option>
        <option value="maintenance">Maintenance</option>
    </select>

    <button class="px-5 py-2 bg-indigo-600 rounded">
        Simpan
    </button>
</form>
@endsection
