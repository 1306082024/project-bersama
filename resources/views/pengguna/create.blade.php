@extends('all.super_admin')

@section('header', 'Tambah User')
@section('subheader', 'Menambahkan pengguna baru')

@section('content')
<form method="POST" action="{{ route('users.store') }}"
      class="bg-gray-900/70 p-6 rounded-2xl border border-gray-700 space-y-4">
    @csrf

    <input name="name" placeholder="Nama"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <input name="email" placeholder="Email"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <select name="role"
            class="w-full p-3 rounded bg-gray-800 border border-gray-700">
        <option value="super admin">Super Admin</option>
        <option value="admin">Admin</option>
        <option value="display">Display</option>
    </select>

    <input type="password" name="password" placeholder="Password"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold">
        Simpan
    </button>
</form>
@endsection
