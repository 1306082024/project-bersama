@extends('admin.admin')

@section('header', 'Detail Ruangan')

@section('content')

<a href="{{ route('admin.rooms.index') }}"
   class="inline-block mb-6 text-indigo-400 hover:underline">
   ← Kembali
</a>

<div class="max-w-3xl bg-gray-900/70 border border-gray-700 rounded-2xl p-8">

    <h2 class="text-5xl font-extrabold mb-6">
        Kamar {{ $room->no_kamar }}
    </h2>

    <div class="grid grid-cols-2 gap-6 text-lg">

        <div>
            <p class="text-gray-400">Tipe Kamar</p>
            <p class="font-semibold">{{ $room->tipe_kamar }}</p>
        </div>

        <div>
            <p class="text-gray-400">Status</p>
            <span class="px-4 py-1 rounded-full text-sm
                {{ $room->status == 'kosong' ? 'bg-gray-700 text-gray-200' : '' }}
                {{ $room->status == 'terisi' ? 'bg-green-500/20 text-green-400' : '' }}
                {{ $room->status == 'maintenance' ? 'bg-yellow-500/20 text-yellow-400' : '' }}">
                {{ ucfirst($room->status) }}
            </span>
        </div>

        <div>
            <p class="text-gray-400">Dibuat</p>
            <p>{{ $room->created_at->format('d M Y') }}</p>
        </div>

        <div>
            <p class="text-gray-400">Terakhir Update</p>
            <p>{{ $room->updated_at->format('d M Y') }}</p>
        </div>

    </div>

    <div class="flex gap-4 mt-8">
        <a href="{{ route('admin.rooms.edit', $room) }}"
           class="px-5 py-2 bg-blue-600 rounded-lg">
            Edit
        </a>

        <form method="POST"
              action="{{ route('admin.rooms.destroy', $room) }}">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin hapus ruangan?')"
                class="px-5 py-2 bg-red-600 rounded-lg">
                Hapus
            </button>
        </form>
    </div>

</div>

@endsection
