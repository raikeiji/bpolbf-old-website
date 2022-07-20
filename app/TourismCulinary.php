<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismCulinary extends Model
{
    protected $table = 'tourism_tm_culinary';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'slug',
        'thumbnail',
        'video_url'
    ];

}
