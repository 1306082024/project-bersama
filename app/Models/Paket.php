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

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
}
