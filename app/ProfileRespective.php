<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileRespective extends Model
{
    protected $table = 'profile_respective';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'video_url'
    ];
}
