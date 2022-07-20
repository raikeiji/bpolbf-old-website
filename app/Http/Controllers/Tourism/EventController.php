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
use App\TourismRelasiTags;
use App\Footer;
use DB;

class EventController extends Controller
{
    public function index()
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $event = DB::table('tourism_tm_event')
                ->select('*', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(waktu_event, '%d %b %Y, %H:%i WITA') as date"), DB::raw("DATE_FORMAT(waktu_event_end, '%d %b %Y, %H:%i WITA') as end_date"), DB::raw("DATE_FORMAT(waktu_event, '%d <small>%b</small>') as tanggal"))
                ->paginate(6);
            

            $data['event'] = $event;
            $data['footer'] = Footer::first();
            
            // dd($gallery);
            return view('tourism/pages/calendar_event',$data);
        } catch (\Exception $e) {
            error_log($e);
            return redirect()->route('tourism');
        }
    }
    
    
    public function load($slug)
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $event = DB::table('tourism_tm_event')
                ->select('*', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', DB::raw("DATE_FORMAT(waktu_event, '%d %b %Y, %H:%i WITA') as date"), DB::raw("DATE_FORMAT(waktu_event_end, '%d %b %Y, %H:%i WITA') as end_date"))
                ->where('slug', $slug)
                ->first();
            
            if($event->kategori == "labuan"){
                $tipe = "ELB";
            }else{
                $tipe = "BLB";
            }

            preg_match("/=(.*)/", $event->video_url, $result);
            if(!empty($result[1])){
                $vid = $result[1];
            }else{
                $vid = "";
            }

            
            $gallery = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_event')
                ->where('id_relasi', '=', $event->id)
                ->get();

            $tag = DB::table('tourism_tr_relasi_tags')
                ->where('tipe_tabel', '=', 'tourism_tm_event')
                ->where('id_relasi', '=', $event->id)
                ->get();

            $data['event'] = $event;
            $data['tipe'] = $tipe;
            $data['vid'] = $vid;
            $data['galleries'] = $gallery;
            $data['tags'] = $tag;
            $data['footer'] = Footer::first();
            
            // dd($gallery);
            return view('tourism/pages/detail_event',$data);
        } catch (\Exception $e) {
            return redirect()->route('tourism');
        }
    }

}