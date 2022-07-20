<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileAbout extends Model
{
    protected $table = 'profile_about';
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
