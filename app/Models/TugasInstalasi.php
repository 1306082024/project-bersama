<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasInstalasi extends Model
{
    protected $table = 'tugas_instalasi';

    protected $fillable = [
        'tamu_id',
        'teknisi_id',
        'status',
        'foto_bukti',
        'catatan_teknisi',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class);
    }
}
