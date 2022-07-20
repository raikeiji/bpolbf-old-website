<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileContact extends Model
{
    use SoftDeletes;
    protected $table = 'profile_contact';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
