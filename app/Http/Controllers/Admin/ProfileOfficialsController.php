<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileOfficials;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileOfficialsController extends Controller
{

    public function LbftaOfficials()
    {
        // $lang = "id";
        $data = ProfileOfficials::orderBy('order', 'asc')->get();
        return view('adminpage.lbfta.officials',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaOfficialsAdd()
    {
    	return view('adminpage.lbfta.officials_add');
    }

    public function LbftaOfficialsStore(Request $request)
    {
        $data = ProfileOfficials::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'order' => $request->order
        ]);
        
        if ($request->hasfile('img')){
            if(!File::exists(public_path().'/uploads/ProfileOfficials/')){
                File::makeDirectory(public_path().'/uploads/ProfileOfficials/');
            }

            $image = $request->imagebase64;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);

            $image = base64_decode($image);
            $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
            $path = public_path()."/uploads/ProfileOfficials/".$image_name;
            file_put_contents($path, $image);

            $img = $image_name;
            $data = ProfileOfficials::where('id','=',$data->id)
                ->update([
                    'image' => $img
                ]);
        }else{
            $img = '';
        }
        
        
        $data2 = ProfileOfficials::orderBy('order', 'asc')->get();
        if ($data){

            // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            return redirect()->route('admin.lbfta.officials', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Officials ']);
        }else{
            
            return redirect()->route('admin.lbfta.officials',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Officials ']);
        }
    }

    public function LbftaOfficialsEdit($id)
    {
        // $lang = "id";
        $data = ProfileOfficials::where('id','=',$id)
        ->first();
        return view('adminpage.lbfta.officials_edit',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaOfficialsUpdate(Request $request)
    {
        $data = ProfileOfficials::where('id', $request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'order' => $request->order
        ]);
        
        if ($request->hasfile('img')){
            if(!File::exists(public_path().'/uploads/ProfileOfficials/')){
                File::makeDirectory(public_path().'/uploads/ProfileOfficials/');
            }

            $image = $request->imagebase64;
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);

            $image = base64_decode($image);
            $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
            $path = public_path()."/uploads/ProfileOfficials/".$image_name;
            file_put_contents($path, $image);

            $img = $image_name;
            $data = ProfileOfficials::where('id','=',$request->id)
                ->update([
                    'image' => $img
                ]);
        }else{
            $img = '';
        }
        
        $data2 = ProfileOfficials::orderBy('order', 'asc')->get();
        if ($data){
            return redirect()->route('admin.lbfta.officials', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit Officials ']);
        }else{
            
            return redirect()->route('admin.lbfta.officials',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit Officials ']);
        }
    }

    public function LbftaOfficialsDelete(Request $request)
    {
        $data = ProfileOfficials::where('id', $request->id)->delete();
        
        $data2 = ProfileOfficials::orderBy('order', 'asc')->get();
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
