<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileReport extends Model
{
    protected $table = 'profile_report';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'slug',
        'file_url',
        'tanggal',
        'document_pdf'
    ];
}
