<?php
/**
 * Created by PhpStorm.
 * User: Kabayan Consulting
 * Date: 6/16/2020
 * Time: 3:30 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TourismRumahProduksi;
use App\TourismTokoArtCraft;
use Illuminate\Http\Request;
use App\UGC;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\TourismRegion;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;

class TourismRumahProduksiController
{
    public function index()
    {
        $data = TourismRumahProduksi::get();
        return view('adminpage.tourism.rumah_prod',['data' => $data, 'status' => 0,'status_message' => '']);
    }

    public function TourismRumahProduksiAdd(){
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.rumah_prod_add',$data);
    }

    public function TourismRumahProduksiEdit($id)
    {
        $data['data'] = TourismRumahProduksi::where('id','=',$id)->first();
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.rumah_prod_edit',$data);
    }
    
    public function TourismRumahProduksiEditDB(Request $request)
    {
        try {
            $data = TourismRumahProduksi::where('id','=',$request->id)
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

            $data2 = TourismRumahProduksi::get();
            if ($data){
                return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Rumah Produksi '.$request->nama]);
            }else{
                return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Rumah Produksi '.$request->nama]);
            }
        } catch (\Exception $e) {
            $data2 = TourismRumahProduksi::get(); 
            return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Rumah Produksi : Silahkan gunakan nama rumah produksi lain']);
        }
    }

    public function TourismRumahProduksiStore(Request $request)
    {
        try {
        // $date = Carbon::parse($request->tanggal);
            $data = TourismRumahProduksi::create([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'jam_buka' => $request->jam_buka,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'nama' => $request->nama,
                'region_id' => $request->region,
            ]);
            
            $data2 = TourismRumahProduksi::get(); 
            if ($data){
                return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Rumah Produksi '.$request->nama]);
            }else{
                return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Rumah Produksi '.$request->nama]);
            }
        } catch (\Exception $e) {
            $data2 = TourismRumahProduksi::get(); 
            return view('adminpage.tourism.rumah_prod',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Rumah Produksi : Silahkan gunakan nama rumah produksi lain']);
        }
    }

    public function TourismRumahProduksiDelete(Request $request)
    {
        // delete data
        $deleteQuery = TourismRumahProduksi::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }
}