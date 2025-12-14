@extends('all.super_admin')

@section('header', 'Edit User')
@section('subheader', 'Perbarui data pengguna')

@section('content')
<form method="POST" action="{{ route('super.admin.users.update', $user) }}"
      class="bg-gray-900/70 p-6 rounded-2xl border border-gray-700 space-y-4">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $user->name }}"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <input name="email" value="{{ $user->email }}"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <select name="role"
            class="w-full p-3 rounded bg-gray-800 border border-gray-700">
        <option value="super admin" {{ $user->role == 'super admin' ? 'selected' : '' }}>Super Admin</option>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="display" {{ $user->role == 'display' ? 'selected' : '' }}>Display</option>
    </select>

    <input type="password" name="password"
           placeholder="Password baru (opsional)"
           class="w-full p-3 rounded bg-gray-800 border border-gray-700">

    <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-semibold">
        Update
    </button>
</form>
@endsection
