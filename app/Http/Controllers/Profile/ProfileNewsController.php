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
use App\Footer;
use DB;

class ProfileNewsController extends Controller
{
    public function index(Request $request)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $news = ProfileNews::where("judul_".$lang,"like",'%'.$request->s.'%')->with('tags')->select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(8);

        $data['news'] = $news;
        $data['footer'] = Footer::first();
        // dd($news);
        return view('profile/pages/news', $data);
    }

    public function load($slug)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $news = ProfileNews::select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date,document_pdf"))->orderBy('tanggal', 'desc')->where('slug', $slug)->first();
        $tags = ProfileNewsTags::where("id_news",$news->id)->select('tag')->get();

        //other article
        $data['other_article'] = ProfileNews::select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date,document_pdf"))->orderBy('tanggal', 'desc')->take(3)->get();

        $data['data'] = $news;
        $data['tags'] = $tags;
         $data['footer'] = Footer::first();
        return view('profile/pages/newsView', $data);
    }

    public function search_tag($tag)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $tags = ProfileNewsTags::where("tag","like","%".$tag."%")->select('id_news')->get()->toArray();
        $list_tags=array();
        foreach ($tags as $key => $v){
            array_push($list_tags,$v['id_news']);
        }

        $news = ProfileNews::whereIn('id', $list_tags)->with('tags')->select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(8);

        $data['news'] = $news;
        $data['footer'] = Footer::first();
        // dd($news);
        return view('profile/pages/news', $data);
    }
}
