<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHN extends Model
{
    protected $table = 'profile_hn';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image'
    ];
}
