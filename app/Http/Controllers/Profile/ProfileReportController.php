<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileNews;
use App\ProfileReport;
use App\Footer;
use DB;

class ProfileReportController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $report = ProfileReport::select('file_url', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(6);

        $data['reports'] = $report;
        $data['footer'] = Footer::first();
        // dd($report);
        return view('profile/pages/report', $data);
    }

    public function load($slug)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $data['report'] = ProfileReport::select('file_url', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date,document_pdf"))->orderBy('tanggal', 'desc')->where('slug', $slug)->first();
        $data['footer'] = Footer::first();
        // $data['news'] = $news;
        // dd($news);
        return view('profile/pages/reportView', $data);
    }
}
