<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileProgramSection extends Model
{
    protected $table = 'profile_program_section';
    protected $fillable = [
        'id_program',
        'judul',
        'deskripsi'
    ];
}
