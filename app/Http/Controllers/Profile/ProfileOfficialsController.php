<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileOfficials;
use App\ProfileReport;
use App\Footer;

use DB;

class ProfileOfficialsController extends Controller
{
    public function index()
    {
        $data['officials'] = ProfileOfficials::select('id','nama', 'jabatan','image','order')->orderBy('order', 'asc')->get();
        $data['footer'] = Footer::first();
        return view('profile/pages/officials',$data);
    }
}
