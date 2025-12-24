<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AroomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('guest')->get();
        return view('ruangan.aindex', compact('rooms'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'kosong')->get();

        return view('ruangan.acreate', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('ruangan.show', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kamar' => 'required|unique:rooms',
            'tipe_kamar' => 'required',
            'status' => 'required'
        ]);

        Room::create($request->all());

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function edit(Room $room)
    {
        return view('ruangan.aedit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'no_kamar' => 'required|unique:rooms,no_kamar,' . $room->id,
            'tipe_kamar' => 'required',
            'status' => 'required'
        ]);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil diupdate');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil dihapus');
    }

    public function byHotel(Hotel $hotel)
    {
        return response()->json(
            $hotel->rooms()
                ->where('status', 'kosong')
                ->select('id', 'no_kamar')
                ->get()
        );
    }
}
