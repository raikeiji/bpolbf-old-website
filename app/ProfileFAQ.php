<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileFAQ extends Model
{
    use SoftDeletes;
    protected $table = 'profile_faq';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'category',
        'tanggal',
    ];
}
