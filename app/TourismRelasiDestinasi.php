<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRelasiDestinasi extends Model
{
    protected $table = 'tourism_tr_relasi_destinasi';
    protected $fillable = [
        'id_destinasi','id_relasi','tipe_tabel'
    ];
}
