<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileOrganization extends Model
{
    protected $table = 'profile_org';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image',
        'image_2',
        'video_url'
    ];
}
