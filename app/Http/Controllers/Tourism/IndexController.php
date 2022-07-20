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
use App\TourismDestination;
use App\TourismAnouncement;
use App\TourismRelasiTags;
use App\TourismEvent;
use App\Footer;
use DB;

class IndexController extends Controller
{
    public function index()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $slider = DB::table('tm_slider')
            ->select('file_img', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
            ->where('page_id', 1)
            ->where('active', 1)
            ->get();

        $enchanting = TourismDestination::with(['Tag'])->where('kategori', 'labuan')
        ->select('id', 'thumbnail', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
        ->where('is_homepage', 1)
        ->get();

        $beyond = TourismDestination::with(['Tag'])->where('kategori', 'beyond')
        ->select('id', 'thumbnail', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
        ->where('is_homepage', 1)
        ->get();
        
        
        $visa = DB::table('tourism_informasi_visa')->select('slug')->where('ishomepage', 1)->first();

        $announcement = TourismAnouncement::select('id', 'image', 'slug', 'judul_'.$lang.' as judul','deskripsi_'.$lang.' as deskripsi')->where('isActive', 1)->orderBy('tanggal', 'DESC')->take(3)->get();

        $event = TourismEvent::select('kategori', 'id', 'thumbnail', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(waktu_event, '%d %b %Y, %H:%i WITA') as date"), DB::raw("DATE_FORMAT(waktu_event_end, '%d %b %Y, %H:%i WITA') as end_date"), DB::raw("DATE_FORMAT(waktu_event, '%d <small>%b</small>') as tanggal"))->orderBy('waktu_event')->take(5)->get();
        
        $ugc = UGC::first();
        
        //random surprise
        $random_suprise = rand(1,2);
        if ($random_suprise==1){
            $suprise = $enchanting[rand(0,count($enchanting)-1)];
        } else {
            $suprise = $beyond[rand(0,count($beyond)-1)];
        }

        $data['ugc'] = $ugc;
        $data['announcement'] = $announcement;
        $data['sliders'] = $slider;
        $data['enchantings'] = $enchanting;
        $data['beyonds'] = $beyond;
        $data['visa'] = $visa;
        $data['events'] = $event;
        $data['surprise'] = $suprise;
        $data['footer'] = Footer::first();

        // dd($data);

        return view('tourism/pages/index',$data);
    }

    public function destination()
    {
        $data['footer'] = Footer::first();
    	return view('tourism/pages/destination',$data);
    }

    public function rumahProduksiLoad($id)
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $rumah_produksi = DB::table('tourism_tm_rumah_produksi')
                ->select('*', 'deskripsi_'.$lang.' as deskripsi')
                ->where('id', $id)
                ->first();

          

            $data['rumah_produksi'] = $rumah_produksi;
            $data['footer'] = Footer::first();
            return view('tourism/pages/rumahproduksi',$data);
        } catch (\Exception $e) {
           return redirect()->route('tourism');
        }
    }

    public function restoLoad($id)
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $resto = DB::table('tourism_tm_resto')
                ->select('*', 'deskripsi_'.$lang.' as deskripsi')
                ->where('id', $id)
                ->first();

          

            $data['resto'] = $resto;
            $data['footer'] = Footer::first();
            return view('tourism/pages/resto',$data);
        } catch (\Exception $e) {
           return redirect()->route('tourism');
        }
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