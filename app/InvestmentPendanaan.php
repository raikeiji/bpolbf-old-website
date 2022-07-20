<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentPendanaan extends Model
{
    use SoftDeletes;
    protected $table = 'investment_pendanaan';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
