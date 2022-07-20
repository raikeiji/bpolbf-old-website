<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRelasiSubKategori extends Model
{
    protected $table = 'tourism_tr_relasi_subkategori';
    protected $fillable = [
      'id_sub','id_relasi','tipe_tabel'
    ];
}
