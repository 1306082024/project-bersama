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
        'wilayah_id' => 'array',
        'harga' => 'decimal:2',
    ];
}
