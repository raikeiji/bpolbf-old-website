<?php

namespace App\Http\Controllers\Covid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Footer;

class CovidController extends Controller
{
    public function index()
    {
        $data['footer'] = Footer::first();
        return view('covid/pages/index',$data);
    }
}
