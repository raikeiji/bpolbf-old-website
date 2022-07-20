<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebPage extends Model
{
    protected $table = 'tm_web_page';

    public function Slider(){
        return $this->hasMany('App\Slider','page_id','id');
    }
}
