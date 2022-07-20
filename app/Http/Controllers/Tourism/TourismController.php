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
use App\TourismAnouncement;
use App\Footer;
class TourismController extends Controller
{
    public function index()
    {
        $ugc = UGC::first();
        $announcement = TourismAnouncement::orderBy('id', 'DESC')->get()->take(3);
        $data['ugc'] = $ugc;
        $data['announcement'] = $announcement;
        $data['footer'] = Footer::first();
        return view('tourism/pages/index',$data);
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