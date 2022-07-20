<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TourismArtCraft;
use App\TourismCulinary;
use App\TourismEvent;
use App\TourismRelasiTags;
use App\TourismResto;
use App\TourismRumahProduksi;
use App\TourismSubKategori;
use App\TourismTags;
use App\TourismTokoArtCraft;
use App\TourismAnouncement;
use Illuminate\Http\Request;
use App\UGC;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\TourismRelasiImg;
use App\TourismRelasiSubKategori;
use App\TourismRelasiDestinasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\TourismRegion;
use App\TourismInformasiVisa;
use App\TourismTourPackage;
use App\TourismDestination;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class TourismPackageController extends Controller
{

    public function TourismPlantTrip()
    {
        $data = TourismTourPackage::get();
        return view('adminpage.tourism.pyt',['data' => $data, 'status' => 0]);
    }

    public function TourismPlantTripAdd()
    {
        $data['labuans'] = TourismDestination::where('kategori', 'labuan')->get();
        $data['beyonds'] = TourismDestination::where('kategori', 'beyond')->get();
        $data['tags'] = TourismTags::get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','not like','%Things To%')->get();
        $data['region'] = TourismRegion::get();

        return view('adminpage.tourism.pyt_add', $data);
    }

    public function TourismPlantTripStore(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id);
            
            // dd($request->imagebase64);
            // dd(TourismRelasiDestinasi::all()->get());

            $data = TourismTourPackage::create([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL
            ]);

            $data2 = TourismTourPackage::get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismPackage/'.$data->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismPackage/'.$data->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'package_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/TourismPackage/".$data->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismTourPackage::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!File::exists(public_path().'/uploads/TourismPackage/'.$data->id.'/gallery/')){
                                File::makeDirectory(public_path().'/uploads/TourismPackage/'.$data->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismPackage/'.$data->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $data->id,
                                'tipe_tabel' => 'tourism_tm_tour_package',
                                'file_img' => $gallery
                            ]);
                        }else{
                            $gallery = '';
                        }
                    }
                }

                
                if ($request->tag){
                    foreach ($request->tag as $t => $v){
                        TourismRelasiTags::create([
                            'id_tag' => $v,
                            'id_relasi' => $data->id,
                            'tipe_tabel' => 'tourism_tm_tour_package'
                        ]);
                    }
                }

                if ($request->subkategori){
                    foreach ($request->subkategori as $s => $v){
                        TourismRelasiSubKategori::create([
                            'id_sub' => $v,
                            'id_relasi' => $data->id,
                            'tipe_tabel' => 'tourism_tm_tour_package'
                        ]);
                    }
                }

                if ($request->destinasi){
                    foreach ($request->destinasi as $d => $v){
                        TourismRelasiDestinasi::create([
                            'id_destinasi' => $v,
                            'id_relasi' => $data->id,
                            'tipe_tabel' => 'tourism_tm_tour_package'
                        ]);
                    }
                }
                
                return view('adminpage.tourism.pyt',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Tour Package '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Tour Package '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismTourPackage::get();
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Tour Package : Silahkan gunakan judul lain']);
        }
    }

    public function TourismPlantTripEdit($id)
    {
        $data = TourismTourPackage::where('id','=',$id)->first();
        return view('adminpage.tourism.pyt_edit',['data' => $data]);
    }

    public function TourismPlantTripUpdate(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id);


            if ($request->hasfile('img')){
                if(!File::exists(public_path().'/Uploads/PYT/'.$request->id.'/')){
                    File::makeDirectory(public_path().'/Uploads/PYT/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = 'PYT'.$request->id.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/Uploads/PYT/'.$request->id.'/', $name);
                $img = $name;
                $image = TourismRelasiImg::where('id_relasi','=',$request->id)
                    ->where('tipe_tabel','=','tourism_tm_tour_package')
                    ->update([
                    'file_img' => $img
                ]);
                $data = TourismTourPackage::where('id','=',$request->id)
                    ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'thumbnail' => $name,
                    'video_url' => $request->URL
                ]);
            }else{
                $img = '';
                $data = TourismTourPackage::where('id','=',$request->id)
                    ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'video_url' => $request->URL
                ]);
            }

            $data2 = TourismTourPackage::get();
            if ($data){
                return view('adminpage.tourism.pyt',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Tour Package '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Tour Package '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismTourPackage::get();
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Tour Package : Silahkan gunakan judul lain']);
        }
    }

    public function TourismPlantTripDelete(Request $request)
    {
        $data = TourismTourPackage::where('id','=',$request->id)->delete();
        if ($data){
            return 1;
        }else{
            return 0;
        }
    }
    
}
