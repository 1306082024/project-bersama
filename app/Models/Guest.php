<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'nama_tamu',
        'room_id',
        'device_id',
        'check_in',
        'check_out'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
