@extends('all.super_admin')

@section('header','Tambah Channel')
@section('subheader','Tambahkan channel IPTV baru')

@section('content')

<div class="max-w-2xl">
    <form method="POST"
        action="{{ route('super.admin.channels.store') }}"
        class="bg-[#2f4150] border border-gray-700 rounded-2xl p-6 space-y-5 shadow-xl">
        @csrf

        <!-- NAMA CHANNEL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Nama Channel</label>
            <input type="text" name="nama_channel"
                class="w-full px-4 py-3 rounded-xl bg-gray-800 focus:ring focus:ring-indigo-500"
                placeholder="Contoh: Berita Nasional"
                required>
        </div>

        <!-- KATEGORI -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Kategori</label>
            <select name="kategori"
                class="w-full px-4 py-3 rounded-xl bg-gray-800">
                <option value="Berita">Berita</option>
                <option value="Musik">Musik</option>
                <option value="Film">Film</option>
                <option value="Anak">Anak</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Dokumenter">Dokumenter</option>
            </select>
        </div>

        <!-- THUMBNAIL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Thumbnail (URL)</label>
            <input type="text" name="thumbnail"
                class="w-full px-4 py-3 rounded-xl bg-gray-800"
                placeholder="https://example.com/image.jpg">
        </div>

        <!-- STREAM URL -->
        <div>
            <label class="block mb-1 text-sm text-gray-300">Stream URL</label>
            <input type="text" name="stream_url"
                class="w-full px-4 py-3 rounded-xl bg-gray-800"
                placeholder="m3u8 / embed / link stream">
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
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <!-- ACTION -->
        <div class="flex gap-3 pt-4">
            <a href="{{ route('super.admin.channels.index') }}"
                class="px-5 py-2 rounded-xl bg-gray-700 hover:bg-gray-600">
                Batal
            </a>

            <button
                class="px-6 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold">
                Simpan Channel
            </button>
        </div>
    </form>
</div>

@endsection