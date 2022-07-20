<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Homepage;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage/index');
    }
}
