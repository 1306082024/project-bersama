@extends('admin.admin')

@section('header', 'Tamu & Perangkat')
@section('subheader', 'Data tamu yang sedang check-in')

@section('content')

<!-- BUTTON TAMBAH -->
<div class="mb-6">
    <a href="{{ route('admin.guests.create') }}"
        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500
              px-5 py-2 rounded-xl font-semibold shadow transition">
        ➕ Tambah Tamu
    </a>
</div>

<!-- CARD GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse ($guests as $guest)

    <div class="rounded-2xl border border-gray-700 bg-gradient-to-br
            from-gray-900/80 to-gray-800/60 p-6 shadow-xl
            hover:scale-[1.02] transition-all duration-300">

        <!-- HEADER -->
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-xl font-bold">
                    {{ $guest->nama_tamu }}
                </h2>
                <p class="text-sm text-gray-400">
                    Check-in:
                    {{ \Carbon\Carbon::parse($guest->check_in)->format('d M Y H:i') }}
                </p>
            </div>

            <span class="px-3 py-1 rounded-full text-sm
            bg-indigo-500/20 text-indigo-400">
                Room {{ $guest->room->no_kamar ?? '-' }}
            </span>
        </div>

        <!-- INFO -->
        <div class="space-y-3 text-sm">

            <div class="flex justify-between">
                <span class="text-gray-400">Hotel</span>
                <span class="font-semibold text-indigo-400">
                    {{ $guest->room->hotel->nama_hotel ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-400">No. Kamar</span>
                <span class="font-semibold">
                    {{ $guest->room->no_kamar ?? '-' }}
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-400">ID Perangkat</span>
                <span class="font-semibold text-cyan-400">
                    {{ $guest->device_id }}
                </span>
            </div>

        </div>

        <!-- ACTION -->
        <div class="flex gap-3 mt-6">
            <a href="{{ route('admin.guests.edit', $guest) }}"
                class="flex-1 text-center px-4 py-2 rounded-xl
                  bg-yellow-500/20 text-yellow-400
                  hover:bg-yellow-500/30 transition">
                ✏️ Edit
            </a>

            <form action="{{ route('admin.guests.destroy', $guest) }}"
                method="POST"
                class="flex-1"
                onsubmit="return confirm('Yakin hapus tamu ini?')">
                @csrf
                @method('DELETE')
                <button
                    class="w-full px-4 py-2 rounded-xl
                       bg-red-500/20 text-red-400
                       hover:bg-red-500/30 transition">
                    🗑️ Hapus
                </button>
            </form>
        </div>

    </div>

    @empty

    <div class="col-span-full text-center text-gray-400 py-10">
        Belum ada data tamu
    </div>

    @endforelse

</div>

@endsection