<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismCulinaryResto extends Model
{
    protected $table = 'tourism_tr_culinary_resto';
    protected $fillable = [
        'id_culinary','id_resto'
    ];
}
