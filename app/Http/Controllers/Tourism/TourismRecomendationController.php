<?php

namespace App\Http\Controllers\Tourism;

use App\Footer;
use App\Http\Controllers\Controller;
use App\TourismRecomendation;
use DateTime;
use Illuminate\Http\Request;

class TourismRecomendationController extends Controller
{
    public function index(){
        $plan = TourismRecomendation::select('*')->get();
        return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> 0,'status_message' => '']);
    }
    public function load($id){
        $rec = TourismRecomendation::select('*')->where('id',$id)->first();
        if($rec){
            return view('adminpage.tourism.recomendation_edit',['data'=>$rec]);
        }else{
            $plan = TourismRecomendation::select('*')->get();
            return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> -1,'status_message' => 'Data Tidak Ditemukan']);
        }
    }
    public function add(){
        return view('adminpage.tourism.recomendation_add');
    }
    public function postRecomendation(Request $request){
        $slug = str_slug($request->judul_id,'-');
        $date2 = new DateTime();
        $tgl = $date2->getTimestamp();
        $doc_name = null;
        if($request->hasFile('image')){
            $doc_name = 'image_'.$slug.$tgl.'_.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/TourismRekomendasi/', $doc_name);
        }
        $rec = new TourismRecomendation();
        $rec->judul_id = $request->judul_id;
        $rec->judul_en = $request->judul_en;
        $rec->judul_cn = $request->judul_cn;
        $rec->link_url = $request->link_url;
        $rec->slug = $slug;
        $rec->image = $doc_name;
        if($rec->save()){
            $plan = TourismRecomendation::select('*')->get();
            return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> 1,'status_message' => 'Berhasil Menambahkan Rekomendasi']);
        }else{
            $plan = TourismRecomendation::select('*')->get();
            return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> 1,'status_message' => 'Gagal Menambahkan Rekomendasi']);
        }
    }
    public function updateRecomendation(Request $request){
        $slug = str_slug($request->judul_id,'-');
        $date2 = new DateTime();
        $tgl = $date2->getTimestamp();
        $doc_name = null;
        if($request->hasFile('image')){
            $doc_name = 'image_'.$slug.$tgl.'_.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/TourismRekomendasi/', $doc_name);
        }
        $rec = TourismRecomendation::where('id',$request->id)->first();
        if($rec){
            $rec->judul_id = $request->judul_id;
            $rec->judul_en = $request->judul_en;
            $rec->judul_cn = $request->judul_cn;
            $rec->link_url = $request->link_url;
            $rec->slug = $slug;
            $rec->image = $doc_name;
            if($rec->save()){
                $plan = TourismRecomendation::select('*')->get();
                return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> 1,'status_message' => 'Berhasil Menambahkan Rekomendasi']);
            }else{
                $plan = TourismRecomendation::select('*')->get();
                return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> 1,'status_message' => 'Gagal Menambahkan Rekomendasi']);
            }
        }else{
            $plan = TourismRecomendation::select('*')->get();
            return view('adminpage.tourism.recomendation',['data' => $plan,'status'=> -1,'status_message' => 'Data Tidak Ditemukan']);
        }
        
    }
    public function deleteRecomendation(Request $request){
        $data = TourismRecomendation::where('id', $request->id)->delete();
        
        $data2 = TourismRecomendation::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }
    public function showIndex(){
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
            $plan = TourismRecomendation::select('judul_id as judul','link_url','image')->get();
        }else{
            if($lang == "id"){
                $plan = TourismRecomendation::select('judul_id as judul','link_url','image')->get();
            }else{
                $plan = TourismRecomendation::select('judul_'.$lang.' as judul','link_url','image')->get();
            }
        }
        $data['recomendation'] = $plan;
        $data['footer'] = Footer::first();
        return view('tourism/pages/rekomendasi',$data);
    }
}
