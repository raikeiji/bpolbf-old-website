<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentBI extends Model
{
    protected $table = 'investment_bi';
    protected $fillable = [
        'nama',
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image',
        'slug'
    ];
}
