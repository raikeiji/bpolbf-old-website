<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismRelasiTags extends Model
{
    protected $table = 'tourism_tr_relasi_tags';
    protected $fillable = [
        'id_tag','id_relasi','tipe_tabel'
    ];
    public function namaTag(){
        return $this->hasOne('App\TourismTags', 'id', 'id_tag');
    }
}
