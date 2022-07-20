<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRegion extends Model
{
    protected $table = 'tourism_tm_region';

    protected $fillable = ['nama','slug','lat','long'];
}
