@extends('all.super_admin')

@section('header','List Hotel')
@section('subheader','Daftar hotel terdaftar')

@section('content')

<a href="{{ route('super.admin.hotels.create') }}"
   class="mb-6 inline-block px-6 py-3 bg-indigo-600 rounded-xl font-semibold hover:bg-indigo-500">
   ➕ Tambah Hotel
</a>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

@foreach($hotels as $hotel)
<div class="rounded-2xl bg-gray-900 border border-gray-700 p-6 shadow-xl
            hover:scale-[1.02] transition">

    <h2 class="text-xl font-bold mb-2">{{ $hotel->nama_hotel }}</h2>
    <p class="text-gray-400 mb-4">{{ $hotel->alamat }}</p>

    <div class="flex gap-3">
        <a href="{{ route('super.admin.hotels.show',$hotel) }}"
           class="flex-1 text-center px-4 py-2 rounded-xl
                  bg-indigo-500/20 text-indigo-400 hover:bg-indigo-500/30">
            Detail
        </a>

        <a href="{{ route('super.admin.hotels.edit',$hotel) }}"
           class="px-4 py-2 rounded-xl bg-yellow-500/20 text-yellow-400">
            ✏️
        </a>

        <form method="POST" action="{{ route('super.admin.hotels.destroy',$hotel) }}">
            @csrf @method('DELETE')
            <button class="px-4 py-2 rounded-xl bg-red-500/20 text-red-400">
                🗑️
            </button>
        </form>
    </div>
</div>
@endforeach

</div>
@endsection
