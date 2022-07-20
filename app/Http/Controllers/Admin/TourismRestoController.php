<?php
/**
 * Created by PhpStorm.
 * User: Kabayan Consulting
 * Date: 6/16/2020
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\TourismRegion;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use App\TourismResto;
use App\TourismCulinaryResto;

class TourismRestoController
{
    public function index(){
        $data = TourismResto::get();
        return view('adminpage.tourism.resto.index',['data' => $data, 'status' => 0,'status_message' => '']);
    }

    public function TourismRestoAdd(){
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.resto.resto_add',$data);
    }

    public function TourismRestoEdit($id)
    {
        $data['data'] = TourismResto::where('id','=',$id)->first();
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.resto.resto_edit',$data);
    }
    
    public function TourismRestoEditDB(Request $request)
    {
        try {
            $data = TourismResto::where('id','=',$request->id)
            ->update([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'jam_buka' => $request->jam_buka,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'nama' => $request->nama,
                'region_id' => $request->region,
            ]);

            $data2 = TourismResto::get();
            if ($data){
                return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Resto '.$request->nama]);
            }else{
                return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Resto '.$request->nama]);
            }
        } catch (\Exception $e) {
            $data2 = TourismResto::get(); 
            return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Resto : Silahkan gunakan nama resto lain']);
        }
    }

    public function TourismRestoStore(Request $request)
    {
        try {
        // $date = Carbon::parse($request->tanggal);
            $data = TourismResto::create([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'jam_buka' => $request->jam_buka,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'nama' => $request->nama,
                'region_id' => $request->region,
            ]);
            
            $data2 = TourismResto::get(); 
            if ($data){
                return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Resto '.$request->nama]);
            }else{
                return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Resto '.$request->nama]);
            }
        } catch (\Exception $e) {
            $data2 = TourismResto::get(); 
            return view('adminpage.tourism.resto.index',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Resto : Silahkan gunakan nama resto lain']);
        }
    }

    public function TourismRestoDelete(Request $request)
    {
        // delete data
        $deleteQuery = TourismResto::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }
}