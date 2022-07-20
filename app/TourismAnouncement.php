<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismAnouncement extends Model
{
    protected $table = 'tourism_announcement';

    protected $fillable = [
        'author','judul_id','judul_en','judul_cn','deskripsi_id',
        'deskripsi_en','deskripsi_cn','image','slug','type','tanggal','isactive'
    ];
}
