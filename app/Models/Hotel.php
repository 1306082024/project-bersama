<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nama_hotel', 'alamat'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
