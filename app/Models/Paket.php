<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';

    protected $fillable = [
        'nama',
        'slug',
        'harga',
        'deskripsi',
        'wilayah_id'
    ];

    protected $casts = [
        'wilayah_id' => 'array'
    ];

    // Paket dipakai banyak tamu
    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
    
    public function wilayahList()
    {
        return Wilayah::whereIn('id', $this->wilayah_id ?? [])->get();
    }
}
