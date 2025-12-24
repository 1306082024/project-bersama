<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $table = 'teknisi';

    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'wilayah_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function tugasInstalasi()
    {
        return $this->hasMany(TugasInstalasi::class);
    }

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}
