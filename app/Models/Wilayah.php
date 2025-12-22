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

    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }

    public function paketList()
    {
        return Paket::whereJsonContains('wilayah_id', $this->id)->get();
    }
}
