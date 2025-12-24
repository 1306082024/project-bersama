<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::with('room')->latest()->get();
        return view('tamu_perangkat.index', compact('guests'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('tamu_perangkat.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'room_id' => 'required',
            'device_id' => 'required',
            'check_in' => 'required',
        ]);

        Guest::create($request->all());

        return redirect()->route('super.admin.guests.index')
            ->with('success', 'Tamu berhasil ditambahkan');
    }

    public function edit(Guest $guest)
    {
        $rooms = Room::all();
        return view('tamu_perangkat.edit', compact('guest','rooms'));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'room_id' => 'required',
            'device_id' => 'required',
            'check_in' => 'required',
        ]);

        $guest->update($request->all());

        return redirect()->route('super.admin.guests.index')
            ->with('success', 'Data tamu diperbarui');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return back()->with('success', 'Data tamu dihapus');
    }
}
