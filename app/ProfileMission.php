<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileMission extends Model
{
    protected $table = 'profile_mission';
    protected $fillable = [
        'judul_id',
        'judul_en',
        'judul_cn',
        'vision_id',
        'vision_en',
        'vision_cn',
        'mission_id',
        'mission_en',
        'mission_cn',
        'video_url'
    ];
}
