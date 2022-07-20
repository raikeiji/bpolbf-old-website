<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismInformasiVisa extends Model
{
    protected  $table = 'tourism_informasi_visa';
    protected $fillable = [
        'judul_id','judul_en','judul_cn','deskripsi_id','deskripsi_en','deskripsi_cn',
        'slug','img','thumbnail','ishomepage','document_pdf'
    ];
}
