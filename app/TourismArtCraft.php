<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismArtCraft extends Model
{
    protected $table = 'tourism_tm_art_craft';
    protected $fillable = [
        'slug','judul_id','judul_en','judul_cn','deskripsi_id','deskripsi_en','deskripsi_cn','thumbnail','video_url',
        'kategori','tipe_tabel','is_homepage'
    ];
}
