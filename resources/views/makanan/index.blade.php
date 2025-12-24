@extends('all.super_admin')

@section('header','Pesan Makanan')
@section('subheader','Daftar pesanan makanan tamu')

@section('content')

<a href="{{ route('super.admin.food-orders.create') }}"
   class="mb-4 inline-block bg-indigo-600 px-4 py-2 rounded">
   + Tambah Pesanan
</a>

<div class="bg-gray-900/70 rounded-2xl overflow-hidden border border-gray-700">
<table class="w-full">
<thead class="bg-gray-800">
<tr>
<th class="p-4">No Kamar</th>
<th class="p-4">Pesanan</th>
<th class="p-4">Total</th>
<th class="p-4">Waktu</th>
<th class="p-4">Status</th>
<th class="p-4">Aksi</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr class="border-t border-gray-700">
<td class="p-4">{{ $order->room->no_kamar }}</td>
<td class="p-4">{{ $order->detail_pesanan }}</td>
<td class="p-4">Rp {{ number_format($order->total) }}</td>
<td class="p-4">{{ $order->waktu_pesan }}</td>
<td class="p-4 capitalize">{{ $order->status }}</td>
<td class="p-4 flex gap-2">
    <a href="{{ route('super.admin.food-orders.edit',$order) }}">✏️</a>
    <form method="POST" action="{{ route('super.admin.food-orders.destroy',$order) }}">
        @csrf @method('DELETE')
        <button>🗑️</button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
