<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentSektor extends Model
{
    protected $table = 'investment_sektor_industri';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image'
    ];
}