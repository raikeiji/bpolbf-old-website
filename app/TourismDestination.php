<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TourismRelasiTags;

class TourismDestination extends Model
{
    protected $table = 'tourism_tm_destination';
    protected $fillable = [
        'region_id','slug','judul_id','judul_en','judul_cn','deskripsi_id','deskripsi_en','deskripsi_cn',
        'panduan_perjalanan_id','panduan_perjalanan_en','panduan_perjalanan_cn','thumbnail','video_url','alamat',
        'email','jam_buka','nomor_telepon','kategori','url_repuso','is_homepage'
    ];

    public function Tag(){
        return $this->hasMany('App\TourismRelasiTags','id_relasi','id')->join('tourism_tm_tags', 'tourism_tm_tags.id', '=', 'tourism_tr_relasi_tags.id_tag');
    }
}
