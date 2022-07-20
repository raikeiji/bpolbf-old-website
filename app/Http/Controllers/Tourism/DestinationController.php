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
use App\TourismDestination;
use App\TourismRelasiTags;
use App\Footer;
use DB;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $destination = TourismDestination::with(['Tag'])->select('*', 'judul_'.$lang.' as judul','judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', 'panduan_perjalanan_'.$lang.' as panduan')
                ->where('kategori', $request->kategori)
                ->paginate(32);
            
            if($request->kategori == "labuan"){
                $tipe = "ELB";
            }else{
                $tipe = "BLB";
            }

            $data['destination'] = $destination;
            $data['tipe_destination'] = $tipe;
            $data['footer'] = Footer::first();

            return view('tourism/pages/destination',$data);
        } catch (\Exception $e) {
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
            $destination = DB::table('tourism_tm_destination')
                ->select('*', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi', 'panduan_perjalanan_'.$lang.' as panduan')
                ->where('slug', $slug)
                ->first();
            
            if($destination->kategori == "labuan"){
                $tipe = "ELB";
            }else{
                $tipe = "BLB";
            }

            preg_match("/=(.*)/", $destination->video_url, $result);
            if(!empty($result[1])){
                $vid = $result[1];
            }else{
                $vid = "";
            }

            if (filter_var($destination->url_repuso, FILTER_VALIDATE_URL) === FALSE) {
                $repuso = "invalid";
            }else{
                $repuso = "valid";
            }
            
            $gallery = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_destination')
                ->where('id_relasi', '=', $destination->id)
                ->get();

            $tag = DB::table('tourism_tr_relasi_tags')
                ->where('tipe_tabel', '=', 'tourism_tm_destination')
                ->where('id_relasi', '=', $destination->id)
                ->get();

            $data['destination'] = $destination;
            $data['tipe'] = $tipe;
            $data['vid'] = $vid;
            $data['repuso'] = $repuso;
            $data['galleries'] = $gallery;
            $data['footer'] = Footer::first();
            // dd($gallery);
            return view('tourism/pages/destinationView',$data);
        } catch (\Exception $e) {
            return redirect()->route('tourism');
        }
    }

    public function loadArt($slug)
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $art = DB::table('tourism_tm_art_craft')
                ->select('*', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
                ->where('slug', $slug)
                ->first();

            $toko = DB::table('tourism_tr_toko_art_craft')
                ->leftJoin('tourism_tm_rumah_produksi','tourism_tr_toko_art_craft.id_toko','=','tourism_tm_rumah_produksi.id')
                ->select('tourism_tm_rumah_produksi.id','tourism_tm_rumah_produksi.alamat','tourism_tm_rumah_produksi.nama','tourism_tm_rumah_produksi.telepon','tourism_tm_rumah_produksi.jam_buka')
                ->where('tourism_tr_toko_art_craft.id_art_craft','=',$art->id)
                ->get();

            $recommendation = DB::table('tourism_tm_art_craft')
                            ->select('*','judul_'.$lang.' as judul')
                            ->where('tourism_tm_art_craft.id','!=',$art->id)
                            ->get();

            if($art->kategori == "labuan"){
                $tipe = "ELB";
            }else{
                $tipe = "BLB";
            }
            preg_match("/=(.*)/", $art->video_url, $result);
            if(!empty($result[1])){
                $vid = $result[1];
            }else{
                $vid = "";
            }

            $gallery = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_art_craft')
                ->where('id_relasi', '=', $art->id)
                ->get();

            $tag = DB::table('tourism_tr_relasi_tags')
                ->where('tipe_tabel', '=', 'tourism_tm_art_craft')
                ->where('id_relasi', '=', $art->id)
                ->get();

            

            $data['art'] = $art;
            $data['tipe'] = $tipe;
            $data['vid'] = $vid;
            $data['galleries'] = $gallery;
            $data['toko'] = $toko;
            $data['recommendation'] = $recommendation;
            $data['footer'] = Footer::first();
            // dd($gallery);
            return view('tourism/pages/artcraft',$data);
        } catch (\Exception $e) {
           return redirect()->route('tourism');
        }
    }

    public function loadCulinary($slug)
    {   
        try{
            $lang = session()->get('locale');
            if (!$lang){
                $lang = "id";
            }
            $culinary = DB::table('tourism_tm_culinary')
                ->select('*', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
                ->where('slug', $slug)
                ->first();

            $resto = DB::table('tourism_tr_culinary_resto')
                ->leftJoin('tourism_tm_resto','tourism_tr_culinary_resto.id_resto','=','tourism_tm_resto.id')
                ->select('tourism_tm_resto.id','tourism_tm_resto.alamat','tourism_tm_resto.nama','tourism_tm_resto.telepon','tourism_tm_resto.jam_buka')
                ->where('tourism_tr_culinary_resto.id_culinary','=',$culinary->id)
                ->get();

            $recommendation = DB::table('tourism_tm_culinary')
                            ->select('*','judul_'.$lang.' as judul')
                            ->where('tourism_tm_culinary.id','!=',$culinary->id)
                            ->get();

            preg_match("/=(.*)/", $culinary->video_url, $result);
            if(!empty($result[1])){
                $vid = $result[1];
            }else{
                $vid = "";
            }
            
            $gallery = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_culinary')
                ->where('id_relasi', '=', $culinary->id)
                ->get();

            $tag = DB::table('tourism_tr_relasi_tags')
                ->where('tipe_tabel', '=', 'tourism_tm_culinary')
                ->where('id_relasi', '=', $culinary->id)
                ->get();

            $data['culinary'] = $culinary;
            $data['vid'] = $vid;
            $data['galleries'] = $gallery;
            $data['resto'] = $resto;
            $data['recommendation'] = $recommendation;
            $data['footer'] = Footer::first();
            // dd($gallery);
            return view('tourism/pages/culinary',$data);
        } catch (\Exception $e) {
            //return redirect()->route('tourism');
            return $e;
        }
    }

    public function loadDo()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $destination = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_destination.judul_'.$lang.' as judul', 'tourism_tm_destination.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_destination.slug', 'tourism_tm_destination.id','tourism_tm_destination.is_homepage', 'tourism_tm_destination.thumbnail', 'tourism_tm_destination.kategori',  'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_destination', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_destination.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 1);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_destination')->groupBy('id_relasi')->get();
        
        $artcraft = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_art_craft.judul_'.$lang.' as judul', 'tourism_tm_art_craft.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_art_craft.slug', 'tourism_tm_art_craft.id', 'tourism_tm_art_craft.thumbnail', 'tourism_tm_art_craft.kategori',   'tourism_tm_art_craft.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_art_craft', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_art_craft.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 1);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_art_craft')->groupBy('id_relasi')->get();

        $culinary = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_culinary.judul_'.$lang.' as judul', 'tourism_tm_culinary.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_culinary.slug', 'tourism_tm_culinary.id', 'tourism_tm_culinary.thumbnail','tourism_tm_culinary.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_culinary', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_culinary.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 1);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_culinary')->groupBy('id_relasi')->get();

       
        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_destination')->get();
        $tagArt = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_art_craft')->get();
        $tagCulinary = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_culinary')->get();
        
        $data['destinations'] = $destination;
        $data['arts'] = $artcraft;
        $data['culinaries'] = $culinary;
        $data['tags'] = $tag;
        $data['tagArts'] = $tagArt;
        $data['tagCulinarys'] = $tagCulinary;
        $data['title'] = "Things to Do";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($destination);
        return view('tourism/pages/things_to',$data);
    }

    public function loadSee()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $destination = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_destination.judul_'.$lang.' as judul', 'tourism_tm_destination.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_destination.slug', 'tourism_tm_destination.id','tourism_tm_destination.is_homepage', 'tourism_tm_destination.thumbnail', 'tourism_tm_destination.kategori',  'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_destination', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_destination.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 3);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_destination')->groupBy('id_relasi')->get();
        
        $artcraft = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_art_craft.judul_'.$lang.' as judul', 'tourism_tm_art_craft.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_art_craft.slug', 'tourism_tm_art_craft.id', 'tourism_tm_art_craft.thumbnail', 'tourism_tm_art_craft.kategori',   'tourism_tm_art_craft.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_art_craft', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_art_craft.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 3);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_art_craft')->groupBy('id_relasi')->get();

        $culinary = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_culinary.judul_'.$lang.' as judul', 'tourism_tm_culinary.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_culinary.slug', 'tourism_tm_culinary.id', 'tourism_tm_culinary.thumbnail','tourism_tm_culinary.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_culinary', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_culinary.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 3);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_culinary')->groupBy('id_relasi')->get();

       
        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_destination')->get();
        $tagArt = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_art_craft')->get();
        $tagCulinary = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_culinary')->get();
        $data['destinations'] = $destination;
        $data['arts'] = $artcraft;
        $data['culinaries'] = $culinary;
        $data['tags'] = $tag;
        $data['tagArts'] = $tagArt;
        $data['tagCulinarys'] = $tagCulinary;
        $data['title'] = "Things to See";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($destination);
        return view('tourism/pages/things_to',$data);
    }

    public function loadBuy()
    {   
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $destination = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_destination.judul_'.$lang.' as judul', 'tourism_tm_destination.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_destination.slug', 'tourism_tm_destination.id','tourism_tm_destination.is_homepage', 'tourism_tm_destination.thumbnail', 'tourism_tm_destination.kategori',  'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_destination', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_destination.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 2);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_destination')->groupBy('id_relasi')->get();
        
        $artcraft = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_art_craft.judul_'.$lang.' as judul', 'tourism_tm_art_craft.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_art_craft.slug', 'tourism_tm_art_craft.id', 'tourism_tm_art_craft.thumbnail', 'tourism_tm_art_craft.kategori',   'tourism_tm_art_craft.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_art_craft', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_art_craft.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 2);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_art_craft')->groupBy('id_relasi')->get();

        $culinary = DB::table('tourism_tr_relasi_subkategori')
        ->select('tourism_tm_culinary.judul_'.$lang.' as judul', 'tourism_tm_culinary.deskripsi_'.$lang.' as deskripsi', 'tourism_tm_culinary.slug', 'tourism_tm_culinary.id', 'tourism_tm_culinary.thumbnail','tourism_tm_culinary.is_homepage', 'tourism_tr_relasi_subkategori.*')
        ->leftJoin('tourism_tm_culinary', 'tourism_tr_relasi_subkategori.id_relasi', '=', 'tourism_tm_culinary.id')
        ->where(function($query){$query->where('tourism_tr_relasi_subkategori.id_sub', 2);})
        ->where('tourism_tr_relasi_subkategori.tipe_tabel', 'tourism_tm_culinary')->groupBy('id_relasi')->get();

       
        $tag = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_destination')->get();
        $tagArt = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_art_craft')->get();
        $tagCulinary = TourismRelasiTags::with('namaTag')->where('tipe_tabel','tourism_tm_culinary')->get();
        $data['destinations'] = $destination;
        $data['arts'] = $artcraft;
        $data['culinaries'] = $culinary;
        $data['tags'] = $tag;
        $data['tagArts'] = $tagArt;
        $data['tagCulinarys'] = $tagCulinary;
        $data['title'] = "Things to Buy";
        $data['footer'] = Footer::first();
        // dd($tag[0]->namaTag->nama_kategori_id);
        // dd($destination);
        return view('tourism/pages/things_to',$data);
    }
}