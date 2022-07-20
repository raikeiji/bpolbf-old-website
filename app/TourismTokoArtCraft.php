<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismTokoArtCraft extends Model
{
    protected $table = 'tourism_tr_toko_art_craft';
    protected $fillable = [
        'id_art_craft','id_toko'
    ];
}
