<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentBerinvestasi extends Model
{
    use SoftDeletes;
    protected $table = 'investment_berinvestasi';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
