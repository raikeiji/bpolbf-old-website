<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileAbout;
use App\ProfileMission;
use App\ProfileOrganization;
use App\ProfileRespective;
use App\Footer;
use DB;

class ProfileSectionController extends Controller
{
    public function about()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['footer'] = Footer::first();
        $data['data'] = ProfileAbout::select('judul_'.$lang.' as judul','deskripsi_'.$lang.' as deskripsi','video_url')->first();
        return view('profile/pages/profile_about', $data);
    }

    public function mission()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['footer'] = Footer::first();
        $data['data'] = ProfileMission::select('judul_'.$lang.' as judul','vision_'.$lang.' as vision','mission_'.$lang.' as mission','video_url')->first();
        return view('profile/pages/profile_mission', $data);
    }

    public function organization()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['footer'] = Footer::first();
        $data['data']  = ProfileOrganization::select('judul_'.$lang.' as judul','deskripsi_'.$lang.' as deskripsi','image','image_2','video_url')->first();
        return view('profile/pages/profile_organization', $data);
    }

    public function respective()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['footer'] = Footer::first();
        $data['data'] = ProfileRespective::select('judul_'.$lang.' as judul','deskripsi_'.$lang.' as deskripsi','video_url')->first();
        return view('profile/pages/profile_respective', $data);
    }
}
