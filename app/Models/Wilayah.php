<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';

    protected $fillable = [
        'nama',
        'slug',
        'keterangan'
    ];

    public function paket()
    {
        return $this->hasMany(Paket::class);
    }

    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
}
