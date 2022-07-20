<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRelasiImg extends Model
{
    protected $table = 'tourism_tr_relasi_img';

    protected $fillable = ['id_relasi','tipe_tabel','file_img'];
}
