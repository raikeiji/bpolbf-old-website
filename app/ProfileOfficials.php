<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileOfficials extends Model
{
    protected $table = 'profile_officials';
    protected $fillable = [
        'nama',
        'jabatan',
        'image',
        'order',
    ];
}
