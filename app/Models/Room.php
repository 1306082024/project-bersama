<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'no_kamar',
        'hotel_id',
        'tipe_kamar',
        'status'
    ];
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function guest()
    {
        return $this->hasOne(Guest::class)
            ->whereNull('check_out');
    }
}
