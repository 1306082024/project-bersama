<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AguestController extends Controller
{
    public function index()
    {
        $guests = Guest::with('room.hotel')->latest()->get();
        return view('tamu_perangkat.aindex', compact('guests'));
    }

    public function create()
    {
        $hotels = Hotel::all();

        return view('tamu_perangkat.acreate', compact('hotels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'room_id' => [
                'required',
                Rule::exists('rooms', 'id')->where('status', 'kosong'),
            ],
            'device_id' => 'required|string|max:50',
            'check_in' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {

            // 🔒 LOCK kamar biar ga bisa dipakai barengan
            $room = Room::lockForUpdate()
                ->where('id', $request->room_id)
                ->where('status', 'kosong')
                ->firstOrFail();

            // 1️⃣ Simpan tamu
            Guest::create([
                'nama_tamu' => $request->nama_tamu,
                'room_id'   => $room->id,
                'device_id' => $request->device_id,
                'check_in'  => Carbon::now(),
                'check_out' => null,
            ]);

            // 2️⃣ Update status kamar
            $room->update([
                'status' => 'terisi'

            ]);
        });

        return redirect()
            ->route('admin.guests.index')
            ->with('success', 'Tamu berhasil check-in & kamar otomatis terisi');
    }

    public function edit(Guest $guest)
    {
        $hotels = Hotel::all();
        $rooms  = Room::where('hotel_id', $guest->room->hotel_id)->get();

        return view('tamu_perangkat.aedit', compact(
            'guest',
            'hotels',
            'rooms'
        ));
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'device_id' => 'required|string|max:50',
        ]);

        $guest->update([
            'nama_tamu' => $request->nama_tamu,
            'device_id' => $request->device_id,
        ]);

        return redirect()
            ->route('admin.guests.index')
            ->with('success', 'Data tamu berhasil diperbarui');
    }


    public function destroy(Guest $guest)
    {
        DB::transaction(function () use ($guest) {

            // balikin status kamar
            Room::where('id', $guest->room_id)
                ->update(['status' => 'kosong']);

            // hapus tamu
            $guest->delete();
        });

        return back()->with('success', 'Tamu checkout, kamar kembali kosong');
    }
}
