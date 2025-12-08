<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamu';

    protected $fillable = [
        'nama',
        'nik',
        'ttl',

        'kontak',
        'email',

        'wilayah_id',
        'paket_id',

        'alamat_jalan',
        'rt',
        'rw',
        'no_rumah',
        'desa',
        'kecamatan',
        'kabupaten',

        'full_alamat',

        'pesan',
        'lokasi',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
