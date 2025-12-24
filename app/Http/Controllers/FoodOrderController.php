<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodOrder;
use App\Models\Room;

class FoodOrderController extends Controller
{
    public function index()
    {
        $orders = FoodOrder::with('room')->latest()->get();
        return view('makanan.index', compact('orders'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('makanan.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'detail_pesanan' => 'required',
            'total' => 'required|numeric',
            'waktu_pesan' => 'required',
            'status' => 'required'
        ]);

        FoodOrder::create($request->all());

        return redirect()
            ->route('super.admin.food-orders.index')
            ->with('success', 'Pesanan berhasil ditambahkan');
    }

    public function edit(FoodOrder $foodOrder)
    {
        $rooms = Room::all();
        return view('makanan.edit', compact('foodOrder', 'rooms'));
    }

    public function update(Request $request, FoodOrder $foodOrder)
    {
        $request->validate([
            'room_id' => 'required',
            'detail_pesanan' => 'required',
            'total' => 'required|numeric',
            'status' => 'required'
        ]);

        $foodOrder->update($request->all());

        return redirect()
            ->route('super.admin.food-orders.index')
            ->with('success', 'Pesanan berhasil diupdate');
    }

    public function destroy(FoodOrder $foodOrder)
    {
        $foodOrder->delete();

        return back()->with('success', 'Pesanan dihapus');
    }
}
