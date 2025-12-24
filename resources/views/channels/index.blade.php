@extends('all.super_admin')

@section('header','List Channel')
@section('subheader','Daftar channel IPTV')

@section('content')

@if(session('success'))
<div class="mb-6 p-4 bg-green-500/20 text-green-400 rounded-xl">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('super.admin.channels.create') }}"
   class="mb-6 inline-flex items-center gap-2 bg-indigo-600 px-5 py-2 rounded-xl font-semibold">
    ➕ Tambah Channel
</a>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($channels as $channel)

<div class="rounded-2xl bg-[#2f4150] shadow-lg overflow-hidden
            hover:scale-[1.02] transition-all duration-300">

    <!-- PREVIEW -->
    <div class="h-40 bg-gray-700 relative">

        @if($channel->preview_video)
            <video
                src="{{ $channel->preview_video }}"
                class="w-full h-full object-cover"
                muted
                loop
                playsinline
                preload="metadata"
                onmouseover="this.play()"
                onmouseleave="this.pause(); this.currentTime=0;"
            ></video>

            <!-- PLAY OVERLAY -->
            <div class="absolute inset-0 flex items-center justify-center
                        opacity-0 hover:opacity-100 transition">
                <div class="bg-black/60 p-3 rounded-full text-white text-xl">
                    ▶
                </div>
            </div>

        @elseif($channel->thumbnail)
            <img src="{{ $channel->thumbnail }}"
                 class="w-full h-full object-cover">
        @else
            <div class="flex items-center justify-center h-full text-gray-400">
                No Preview
            </div>
        @endif

    </div>

    <!-- BODY -->
    <div class="p-4 space-y-2">

        <h3 class="text-lg font-bold truncate">
            {{ $channel->nama_channel }}
        </h3>

        <p class="text-sm text-gray-300 truncate">
            {{ $channel->kategori }}
        </p>

        <span class="inline-block px-3 py-1 rounded-full text-xs
            {{ $channel->is_active
                ? 'bg-green-500/20 text-green-400'
                : 'bg-red-500/20 text-red-400' }}">
            {{ $channel->is_active ? 'Aktif' : 'Nonaktif' }}
        </span>

        <!-- ACTION -->
        <div class="flex gap-3 mt-4">
            <a href="{{ route('super.admin.channels.edit',$channel) }}"
               class="flex-1 text-center px-3 py-2 bg-yellow-500/20 text-yellow-400 rounded-xl">
                ✏️ Edit
            </a>

            <form method="POST"
                  action="{{ route('super.admin.channels.destroy',$channel) }}"
                  class="flex-1"
                  onsubmit="return confirm('Hapus channel ini?')">
                @csrf
                @method('DELETE')
                <button
                    class="w-full px-3 py-2 bg-red-500/20 text-red-400 rounded-xl">
                    🗑️ Hapus
                </button>
            </form>
        </div>

    </div>

</div>

@empty
<div class="col-span-full text-center text-gray-400 py-10">
    Belum ada channel
</div>
@endforelse

</div>
@endsection
