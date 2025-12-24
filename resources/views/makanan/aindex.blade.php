@extends('admin.admin')

@section('header','Pesan Makanan')
@section('subheader','Daftar pesanan makanan tamu')

@section('content')

<!-- BUTTON TAMBAH -->
<a href="{{ route('admin.food-orders.create') }}"
   class="mb-6 inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500
          px-5 py-2 rounded-xl font-semibold shadow transition">
   🍽️ Tambah Pesanan
</a>

<!-- GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($orders as $order)

@php
    $statusStyle = match($order->status) {
        'pending' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/40',
        'diproses' => 'bg-blue-500/20 text-blue-400 border-blue-500/40',
        'selesai' => 'bg-green-500/20 text-green-400 border-green-500/40',
        default => 'bg-gray-500/20 text-gray-400 border-gray-500/40'
    };
@endphp

<div class="rounded-2xl border {{ $statusStyle }}
            bg-gradient-to-br from-gray-900/80 to-gray-800/60
            p-6 shadow-xl hover:scale-[1.02] transition-all duration-300">

    <!-- HEADER -->
    <div class="flex justify-between items-start mb-4">
        <div>
            <h2 class="text-xl font-bold">
                Kamar {{ $order->room->no_kamar ?? '-' }}
            </h2>
            <p class="text-sm text-gray-400">
                {{ \Carbon\Carbon::parse($order->waktu_pesan)->format('d M Y H:i') }}
            </p>
        </div>

        <span class="px-3 py-1 rounded-full text-sm font-semibold capitalize
              {{ $statusStyle }}">
            {{ $order->status }}
        </span>
    </div>

    <!-- DETAIL PESANAN -->
    <div class="mb-4">
        <p class="text-gray-300 text-sm mb-1">Detail Pesanan</p>
        <p class="font-medium leading-relaxed">
            {{ $order->detail_pesanan }}
        </p>
    </div>

    <!-- TOTAL -->
    <div class="flex justify-between items-center mb-5">
        <span class="text-gray-400">Total</span>
        <span class="text-lg font-extrabold text-indigo-400">
            Rp {{ number_format($order->total) }}
        </span>
    </div>

    <!-- ACTION -->
    <div class="flex gap-3">
        <a href="{{ route('admin.food-orders.edit',$order) }}"
           class="flex-1 text-center px-4 py-2 rounded-xl
                  bg-yellow-500/20 text-yellow-400
                  hover:bg-yellow-500/30 transition">
            ✏️ Edit
        </a>

        <form method="POST"
              action="{{ route('admin.food-orders.destroy',$order) }}"
              class="flex-1"
              onsubmit="return confirm('Hapus pesanan ini?')">
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
    Belum ada pesanan makanan
</div>
@endforelse

</div>

@endsection
