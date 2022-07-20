<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileProgram extends Model
{
    protected $table = 'profile_program';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'icon',
        'tanggal',
        'slug'
    ];
}
