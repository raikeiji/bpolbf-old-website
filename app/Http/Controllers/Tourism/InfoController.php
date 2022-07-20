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
use App\TourismInformasiVisa;
use App\Footer;
use DB;

class InfoController extends Controller
{
    public function load($slug)
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $data['info'] = TourismInformasiVisa::select('judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi','document_pdf')->where('slug', $slug)->first();
        // $data['announcement'] = $announcement;
        // dd($info);
        $data['footer'] = Footer::first();
        return view('tourism/pages/info_visa', $data);
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