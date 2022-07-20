<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\InvestmentBI;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class InvestmentBIController extends Controller
{

    public function BI()
    {
        // $lang = "id";
        $data = InvestmentBI::orderBy('updated_at', 'desc')->get();
        return view('adminpage.industri-investment.business_insiders',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function BIAdd()
    {
    	return view('adminpage.industri-investment.business_insiders_add');
    }

    public function BIStore(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id,'-');
            // dd($request->all());
            $data = InvestmentBI::create([
                    'nama' => $request->judul_id,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'slug' => $slug
                ]);
            
            $data2 = InvestmentBI::get(); 
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/InvestmentBI/')){
                        File::makeDirectory(public_path().'/uploads/InvestmentBI/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/InvestmentBI/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    $data = InvestmentBI::where('id','=',$data->id)
                        ->update([
                            'image' => $img
                        ]);
                }else{
                    $img = '';
                }

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.inv.business_insiders', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Business Insider ']);
            }else{
                
                return redirect()->route('admin.inv.business_insiders',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Business Insider ']);
            }
        } catch (\Exception $e) {
            error_log($e);
            $data2 = InvestmentBI::get(); 
            return redirect()->route('admin.inv.business_insiders',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Business Insider : Silahkan gunakan nama yang lain']);
        }
    }
    

    public function BIEdit($id)
    {
        // $lang = "id";
        $data = InvestmentBI::where('id','=',$id)
        ->first();
        return view('adminpage.industri-investment.business_insiders_edit',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function BIUpdate(Request $request)
    {
        try {
            // $date = Carbon::parse($request->tanggal);
            $slug = str_slug($request->judul_id,'-');
            // dd($request->all());
            $data = InvestmentBI::where('id', $request->id)->update([
                    'nama' => $request->judul_id,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'slug' => $slug
                ]);
            

            $data2 = InvestmentBI::get(); 
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/InvestmentBI/')){
                        File::makeDirectory(public_path().'/uploads/InvestmentBI/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/InvestmentBI/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    $data = InvestmentBI::where('id','=',$request->id)
                        ->update([
                            'image' => $img
                        ]);
                }else{
                    $img = '';
                }

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.inv.business_insiders', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit Business Insider ']);
            }else{
                return redirect()->route('admin.inv.business_insiders',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit Business Insider ']);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentBI::get(); 
            return redirect()->route('admin.inv.business_insiders',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit Business Insider : Silahkan gunakan nama yang lain']);
        }
    }

    public function BIDelete(Request $request)
    {
        $data = InvestmentBI::where('id', $request->id)->delete();

        $data2 = InvestmentBI::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
