@extends('all.super_admin')

@section('header', 'Tamu & Perangkat')
@section('subheader', 'Data tamu yang sedang check-in')

@section('content')

<!-- BUTTON TAMBAH -->
<div class="mb-6">
    <a href="{{ route('super.admin.guests.create') }}"
       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500
              px-4 py-2 rounded-xl shadow transition">
        ➕ Tambah Tamu
    </a>
</div>

<!-- TABLE -->
<div class="bg-gray-900/70 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">

    <table class="w-full text-left text-sm">
        <thead class="bg-gray-800 text-gray-300">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Nama Tamu</th>
                <th class="p-4">No. Kamar</th>
                <th class="p-4">ID Perangkat</th>
                <th class="p-4">Check-in</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($guests as $guest)
            <tr class="border-t border-gray-700 hover:bg-gray-800/50 transition">
                <td class="p-4 text-gray-400">
                    {{ $loop->iteration }}
                </td>

                <td class="p-4 font-semibold">
                    {{ $guest->nama_tamu }}
                </td>

                <td class="p-4">
                    {{ $guest->room->no_kamar ?? '-' }}
                </td>

                <td class="p-4">
                    {{ $guest->device_id }}
                </td>

                <td class="p-4 text-gray-400">
                    {{ \Carbon\Carbon::parse($guest->check_in)->format('d M Y H:i') }}
                </td>

                <td class="p-4">
                    <div class="flex justify-center gap-3">

                        <!-- EDIT -->
                        <a href="{{ route('super.admin.guests.edit', $guest) }}"
                           class="px-3 py-1 rounded-lg bg-yellow-500/20
                                  text-yellow-400 hover:bg-yellow-500/30 transition">
                            ✏️ Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('super.admin.guests.destroy', $guest) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus tamu ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-3 py-1 rounded-lg bg-red-500/20
                                       text-red-400 hover:bg-red-500/30 transition">
                                🗑️ Hapus
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-6 text-center text-gray-400">
                    Belum ada data tamu
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
