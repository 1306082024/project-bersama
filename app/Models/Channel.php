<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'nama_channel',
        'kategori',
        'thumbnail',
        'stream_url',
        'is_active',
        'preview_video',
        'stream_url',
    ];
}
