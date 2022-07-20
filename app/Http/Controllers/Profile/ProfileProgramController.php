<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\WebPage;
use App\Slider;
use App\ProfileProgram;
use App\ProfileProgramSection;
use App\ProfileReport;
use App\Footer;
use DB;

class ProfileProgramController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['programs'] = ProfileProgram::select('icon', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->paginate(8);
        $data['footer'] = Footer::first();
        return view('profile/pages/program',$data);
    }

    public function load($slug)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data = ProfileProgram::select('id','icon', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->orderBy('tanggal', 'desc')->where('slug', $slug)->first();
        $sub_program = ProfileProgramSection::select('id','judul','deskripsi')->where('id_program', $data->id)->get();
        $data['footer'] = Footer::first();
        $data["data"]=$data;
        $data["sub_program"]=$sub_program;
        return view('profile/pages/programView', $data);
    }
}
