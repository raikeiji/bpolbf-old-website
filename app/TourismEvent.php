<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismEvent extends Model
{
    protected $table = 'tourism_tm_event';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'tipe_tabel',
        'id_region',
        'id_relasi',
        'slug',
        'thumbnail',
        'video_url',
        'waktu_event',
        'waktu_event_end',
        'status_event',
        'url_tiket',
        'penyelenggara',
        'kategori'
    ];
}
