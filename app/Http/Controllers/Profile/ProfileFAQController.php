<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileFAQ;
use App\ProfileReport;
use App\Footer;

use DB;

class ProfileFAQController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['faq'] = ProfileFAQ::select('id','category','judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(10);
        $data['footer'] = Footer::first();
        return view('profile/pages/faq',$data);
    }

    public function contact()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['faq'] = ProfileFAQ::select('id','category','judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(10);
        $data['footer'] = Footer::first();
        return view('profile/pages/contact',$data);
    }
}
