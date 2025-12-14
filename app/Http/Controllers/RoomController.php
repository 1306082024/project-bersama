<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('ruangan.index', compact('rooms'));
    }

    public function create()
    {
        return view('ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required|unique:rooms',
            'tipe_kamar' => 'required',
            'status' => 'required'
        ]);

        Room::create($request->all());

        return redirect()->route('super.admin.rooms.index')
            ->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function edit(Room $room)
    {
        return view('ruangan.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'no_kamar' => 'required|unique:rooms,no_kamar,' . $room->id,
            'tipe_kamar' => 'required',
            'status' => 'required'
        ]);

        $room->update($request->all());

        return redirect()->route('super.admin.rooms.index')
            ->with('success', 'Ruangan berhasil diupdate');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('super.admin.rooms.index')
            ->with('success', 'Ruangan berhasil dihapus');
    }
}
