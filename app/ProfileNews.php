<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileNews extends Model
{
    protected $table = 'profile_news';
    protected $fillable = [
        'author',
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image',
        'slug',
        'type',
        'tanggal',
        'isactive',
        'document_pdf'
    ];
    
    public function tags(){
        return $this->hasMany('App\ProfileNewsTags', 'id_news', 'id');
    }
}
