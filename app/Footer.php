<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'layout_footer';
    protected $fillable = [
        'background_image',
        'privacy_link',
        'youtube_link',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'alamat'
    ];
}
