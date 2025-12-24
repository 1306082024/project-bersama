@extends('all.super_admin')

@section('header','Edit Channel')
@section('subheader','Perbarui data channel')

@section('content')

<div class="max-w-2xl">
    <form method="POST"
        action="{{ route('super.admin.channels.update', $channel) }}"
        class="bg-[#2f4150] border border-gray-700 rounded-2xl p-6 space-y-5 shadow-xl">
        @csrf
        @method('PUT')

        <!-- NAMA CHANNEL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Nama Channel</label>
            <input type="text" name="nama_channel"
                value="{{ $channel->nama_channel }}"
                class="w-full px-4 py-3 rounded-xl bg-gray-800"
                required>
        </div>

        <!-- KATEGORI -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Kategori</label>
            <select name="kategori"
                class="w-full px-4 py-3 rounded-xl bg-gray-800">
                @foreach(['Berita','Musik','Film','Anak','Olahraga','Dokumenter'] as $kat)
                <option value="{{ $kat }}"
                    {{ $channel->kategori == $kat ? 'selected' : '' }}>
                    {{ $kat }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- THUMBNAIL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Thumbnail (URL)</label>
            <input type="text" name="thumbnail"
                value="{{ $channel->thumbnail }}"
                class="w-full px-4 py-3 rounded-xl bg-gray-800">
        </div>

        <!-- STREAM URL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Stream URL</label>
            <input type="text" name="stream_url"
                value="{{ $channel->stream_url }}"
                class="w-full px-4 py-3 rounded-xl bg-gray-800">
        </div>

        <div>
            <label>Preview Video (MP4 / URL)</label>
            <input type="text" name="preview_video" class="form-control"
                placeholder="https://example.com/preview.mp4">
        </div>

        <div>
            <label>Stream URL</label>
            <input type="text" name="stream_url" class="form-control"
                placeholder="http://live.tv/stream.m3u8">
        </div>

        <!-- STATUS -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Status</label>
            <select name="is_active"
                class="w-full px-4 py-3 rounded-xl bg-gray-800">
                <option value="1" {{ $channel->is_active ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="0" {{ !$channel->is_active ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
        </div>

        <!-- ACTION -->
        <div class="flex gap-3 pt-4">
            <a href="{{ route('super.admin.channels.index') }}"
                class="px-5 py-2 rounded-xl bg-gray-700 hover:bg-gray-600">
                Kembali
            </a>

            <button
                class="px-6 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold">
                Update Channel
            </button>
        </div>
    </form>
</div>

@endsection