<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileNews;
use App\ProfileNewsTags;
use App\ProfileReport;
use App\ProfileFAQ;
use App\ProfileProgram;
use App\ProfileHN;
use App\Footer;
use DB;

class ProfileController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        
        $slider = DB::table('tm_slider')
            ->select('file_img', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
            ->where('page_id', 3)
            ->where('active', 1)
            ->get();

        $news = ProfileNews::with('tags')->select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->take(4)->get();
        $programs = ProfileProgram::select('icon', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->take(4)->get();

        // faq
        $faq = ProfileFAQ::select('id','category','judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->take(10)->get();
        
        $report = ProfileReport::select('file_url', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->take(10)->get();

        $hn = ProfileHN::select('image','judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')->first();

        $data['sliders'] = $slider;
        $data['news'] = $news;
        $data['reports'] = $report;
        $data['programs'] = $programs;
        $data['faq'] = $faq;
        $data['hn'] = $hn;
        $data['footer'] = Footer::first();
        // dd($news);
        return view('profile/pages/index', $data);
    }
}
