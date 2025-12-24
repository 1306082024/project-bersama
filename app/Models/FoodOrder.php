<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    protected $fillable = [
        'room_id',
        'detail_pesanan',
        'total',
        'waktu_pesan',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
