<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 05/06/2020
 * Time: 9:00
 */

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\UGC;
use DB;
use App\TourismAnouncement;
use App\Footer;

class AnnouncementController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $announcement = TourismAnouncement::select('id','image', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as date"))->where('isActive', 1)->orderBy('tanggal', 'desc')->paginate(6);

        $data['announcement'] = $announcement;
        $data['footer'] = Footer::first();

        return view('tourism/pages/announcement',$data);
    }
    
    public function load($slug)
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['announcement'] = TourismAnouncement::select('judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(tanggal, '%d %b %Y') as tanggal"))->where('isActive', 1)->where('slug', $slug)->first();
        // $data['announcement'] = $announcement;
        // dd($announcement
        $data['footer'] = Footer::first();

        //other article
        $data['other_article'] = TourismAnouncement::select('judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi','tanggal','slug','image')->where('isActive', 1)->where('slug',"!=", $slug)->orderBy('tanggal', 'desc')->take(3)->get();

        return view('tourism/pages/announcementView',$data);
    }

    public function destination()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/destination',$data);
    }

    public function thematic()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/thematic',$data);
    }

    public function ThingsToDo()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/things_to_do',$data);
    }

    public function CalendarEvent()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/calendar_event',$data);
    }

    public function DetailEvent()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/detail_event',$data);
    }
}