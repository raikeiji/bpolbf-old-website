<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismPlanTrip extends Model
{
    protected $table = 'tourism_plan_trip';
    protected $fillable = [
        'id',
        'panduan_desc',
        'panduan_desc_en',
        'panduan_desc_ch',
        'panduan_link',
        'visa_desc',
        'visa_desc_en',
        'visa_desc_cn',
        'recomendation_desc',
        'recomendation_desc_cn',
        'recomendation_desc_en',
        'registration_desc',
        'registration_desc_en',
        'registration_desc_en',
        'registration_link',
        'created_at',
        'updated_at',
    ];
}
