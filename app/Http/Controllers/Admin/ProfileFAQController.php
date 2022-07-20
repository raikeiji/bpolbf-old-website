<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileFAQ;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileFAQController extends Controller
{

    public function LbftaFAQ()
    {
        // $lang = "id";
        $data = ProfileFAQ::orderBy('tanggal', 'desc')->get();
        return view('adminpage.lbfta.faq',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaFAQAdd()
    {
    	return view('adminpage.lbfta.faq_add');
    }

    public function LbftaFAQStore(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        // dd($request->all());
        $data = ProfileFAQ::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'category' => $request->category,
                'tanggal' => $date
            ]);
        
        $data2 = ProfileFAQ::get(); 
        if ($data){

            // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            return redirect()->route('admin.lbfta.faq', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah FAQ ']);
        }else{
            
            return redirect()->route('admin.lbfta.faq',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah FAQ ']);
        }
    }

    public function LbftaFAQEdit($id)
    {
        // $lang = "id";
        $data = ProfileFAQ::where('id','=',$id)
        ->first();
        return view('adminpage.lbfta.faq_edit',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaFAQUpdate(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        // dd($request->all());
        $data = ProfileFAQ::where('id', $request->id)->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'category' => $request->category,
                'tanggal' => $date
            ]);
        
        $data2 = ProfileFAQ::get(); 
        if ($data){
            return redirect()->route('admin.lbfta.faq', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit FAQ ']);
        }else{
            
            return redirect()->route('admin.lbfta.faq',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit FAQ ']);
        }
    }

    public function LbftaFAQDelete(Request $request)
    {
        $data = ProfileFAQ::where('id', $request->id)->delete();
        
        $data2 = ProfileFAQ::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
