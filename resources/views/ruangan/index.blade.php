@extends('all.super_admin')

@section('header', 'Kelola Ruangan')

@section('content')

<a href="{{ route('super.admin.rooms.create') }}"
   class="mb-4 inline-block px-4 py-2 bg-indigo-600 rounded-lg">
   + Tambah Ruangan
</a>

<div class="bg-gray-900 rounded-xl overflow-hidden">
<table class="w-full text-left">
    <thead class="bg-gray-800">
        <tr>
            <th class="p-4">No</th>
            <th class="p-4">No Kamar</th>
            <th class="p-4">Tipe Kamar</th>
            <th class="p-4">Status</th>
            <th class="p-4">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr class="border-t border-gray-700">
            <td class="p-4">{{ $loop->iteration }}</td>
            <td class="p-4">{{ $room->no_kamar }}</td>
            <td class="p-4">{{ $room->tipe_kamar }}</td>
            <td class="p-4">
                <span class="px-3 py-1 rounded-full text-sm
                {{ $room->status == 'kosong' ? 'bg-green-500/20 text-green-400' : '' }}
                {{ $room->status == 'terisi' ? 'bg-red-500/20 text-red-400' : '' }}
                {{ $room->status == 'maintenance' ? 'bg-yellow-500/20 text-yellow-400' : '' }}">
                {{ $room->status }}
                </span>
            </td>
            <td class="p-4 flex gap-2">
                <a href="{{ route('super.admin.rooms.edit', $room) }}"
                   class="px-3 py-1 bg-blue-600 rounded">Edit</a>

                <form method="POST"
                      action="{{ route('super.admin.rooms.destroy', $room) }}">
                    @csrf @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 rounded"
                        onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
