<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRumahProduksi extends Model
{
    protected $table = 'tourism_tm_rumah_produksi';
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
