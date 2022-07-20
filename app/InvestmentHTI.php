<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentHTI extends Model
{
    protected $table = 'investment_hti';
    protected $fillable = [
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'image'
    ];
}
