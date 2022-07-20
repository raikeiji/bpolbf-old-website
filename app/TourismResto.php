<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismResto extends Model
{
    protected $table = 'tourism_tm_resto';
    protected $fillable = [
        'deskripsi_id',
        'deskripsi_en',
        'deskripsi_cn',
        'jam_buka',
        'alamat',
        'telepon',
        'nama',
        'region_id',
    ];
}
