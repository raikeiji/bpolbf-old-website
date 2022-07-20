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
use App\TourismTourPackage;
use App\TourismRelasiTags;
use Illuminate\Support\Carbon;
use App\Footer;
use DB;
use File;


class PackageController extends Controller
{
    public function loadPackage($slug)
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $package = TourismTourPackage::select('judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', 'id')->where('slug', $slug)->first();
        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_tour_package')->where('id_relasi', $package->id)->get();
        $data['package'] = $package;
        $data['tags'] = $tag;
        $data['footer'] = Footer::first();
        // dd($tag);
        return view('tourism/pages/package',$data);
    }

    public function loadItinerary()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $package = TourismTourPackage::select('judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', 'slug', 'id', 'thumbnail')->get();
        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_tour_package')->get();
        $data['packages'] = $package;
        $data['tags'] = $tag;
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        return view('tourism/pages/itinerary',$data);
    }

    public function loadAdventure()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $package = DB::table('tourism_tr_relasi_tags')->select('tourism_tm_tour_package.judul_'.$lang.' as judul', 'tourism_tm_tour_package.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_tour_package.slug', 'tourism_tm_tour_package.id', 'thumbnail', 'tourism_tr_relasi_tags.*')->leftJoin('tourism_tm_tour_package', 'tourism_tr_relasi_tags.id_relasi', '=', 'tourism_tm_tour_package.id')
        ->where(function($query){
                $query->where('tourism_tr_relasi_tags.id_tag', 1)
                    ->orWhere('tourism_tr_relasi_tags.id_tag', 2);
            })
        ->where('tourism_tr_relasi_tags.tipe_tabel', 'tourism_tm_tour_package')->groupBy('id_relasi')->get();

        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_tour_package')->get();
        $data['packages'] = $package;
        $data['tags'] = $tag;
        $data['title'] = "Adventure";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($package);
        return view('tourism/pages/thematic',$data);
    }

    public function loadCulture()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $package = DB::table('tourism_tr_relasi_tags')->select('tourism_tm_tour_package.judul_'.$lang.' as judul', 'tourism_tm_tour_package.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_tour_package.slug', 'tourism_tm_tour_package.id', 'thumbnail', 'tourism_tr_relasi_tags.*')->leftJoin('tourism_tm_tour_package', 'tourism_tr_relasi_tags.id_relasi', '=', 'tourism_tm_tour_package.id')
        ->where(function($query){
                $query->where('tourism_tr_relasi_tags.id_tag', 2)
                ->orWhere('tourism_tr_relasi_tags.id_tag', 4);
            })
        ->where('tourism_tr_relasi_tags.tipe_tabel', 'tourism_tm_tour_package')->groupBy('id_relasi')->get();

        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_tour_package')->get();
        $data['packages'] = $package;
        $data['tags'] = $tag;
        $data['title'] = "Culture";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($package);
        return view('tourism/pages/thematic',$data);
    }

    public function loadLeisure()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $package = DB::table('tourism_tr_relasi_tags')->select('tourism_tm_tour_package.judul_'.$lang.' as judul', 'tourism_tm_tour_package.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_tour_package.slug', 'tourism_tm_tour_package.id', 'thumbnail', 'tourism_tr_relasi_tags.*')->leftJoin('tourism_tm_tour_package', 'tourism_tr_relasi_tags.id_relasi', '=', 'tourism_tm_tour_package.id')
        ->where(function($query){
                $query->where('tourism_tr_relasi_tags.id_tag', 3)
                    ->orWhere('tourism_tr_relasi_tags.id_tag', 4);
            })
        ->where('tourism_tr_relasi_tags.tipe_tabel', 'tourism_tm_tour_package')->groupBy('id_relasi')->get();

        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_tour_package')->get();
        $data['packages'] = $package;
        $data['tags'] = $tag;
        $data['title'] = "Leisure";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($package);
        return view('tourism/pages/thematic',$data);
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