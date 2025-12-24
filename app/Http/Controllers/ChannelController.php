<?php

namespace App\Http\Controllers;

use App\Models\Channel;

use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = Channel::latest()->get();
        return view('channels.index', compact('channels'));
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_channel'  => 'required|string|max:255',
            'kategori'      => 'required|string|max:255',
            'thumbnail'     => 'nullable|string',
            'preview_video' => 'nullable|string',
            'stream_url'    => 'required|string',
        ]);

        Channel::create($validated);

        return redirect()
            ->route('super.admin.channels.index')
            ->with('success', 'Channel berhasil ditambahkan');
    }


    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->all());

        return redirect()
            ->route('super.admin.channels.index')
            ->with('success', 'Channel berhasil diperbarui');
    }

    public function destroy(Channel $channel)
    {
        $channel->delete();

        return back()->with('success', 'Channel berhasil dihapus');
    }
}
