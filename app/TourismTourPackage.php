<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismTourPackage extends Model
{
    protected $table = 'tourism_tm_tour_package';

    protected $fillable = [
        'judul_id','judul_en','judul_cn','deskripsi_id','deskripsi_en','deskripsi_cn',
        'thumbnail','video_url','slug'
    ];
}
