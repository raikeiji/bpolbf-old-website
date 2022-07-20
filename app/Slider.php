<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'tm_slider';

    protected $fillable = ['judul_id','judul_en','judul_cn','deskripsi_id','deskripsi_en','deskripsi_cn','page_id','file_img', 'active', 'slug'];

    public function img(){
        $this->hasOne('App\TourismRelasiImg','id_relasi','id');
    }

}
