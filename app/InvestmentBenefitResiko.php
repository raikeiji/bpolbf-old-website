<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentBenefitResiko extends Model
{
    protected $table = 'investment_benefit_resiko';
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