<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->get();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_hotel' => 'required',
            'alamat' => 'required'
        ]);

        Hotel::create($request->all());

        return redirect()->route('super.admin.hotels.index')
            ->with('success', 'Hotel berhasil ditambahkan');
    }

    public function show(Hotel $hotel)
    {
        $hotel->load(['rooms.guest']);

        return view('hotels.show', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->all());
        return redirect()->route('super.admin.hotels.index')
            ->with('success', 'Hotel berhasil diperbarui');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return back()->with('success', 'Hotel berhasil dihapus');
    }
}
