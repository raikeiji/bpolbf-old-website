<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileNewsTags extends Model
{
    protected $table = 'profile_news_tags';
    protected $fillable = [
        'id_news',
        'tag',
    ];

}
