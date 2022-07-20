<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TourismArtCraft;
use App\TourismCulinary;
use App\TourismCulinaryResto;
use App\TourismEvent;
use App\TourismRelasiSubKategori;
use App\TourismRelasiTags;
use App\TourismResto;
use App\TourismRumahProduksi;
use App\TourismSubKategori;
use App\TourismTags;
use App\TourismTokoArtCraft;
use Illuminate\Http\Request;
use App\UGC;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\TourismRelasiImg;
use App\TourismAnouncement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\TourismRegion;
use App\TourismInformasiVisa;
use App\TourismTourPackage;
use App\TourismDestination;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class TourismCulinaryController extends Controller
{

    public function TourismCulinary()
    {
        $data = TourismCulinary::get();
        return view('adminpage.tourism.culinary',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function TourismCulinaryAdd()
    {
        $data['restos'] = TourismResto::get();
        return view('adminpage.tourism.culinary_add',$data);
    }

    public function TourismCulinaryStore(Request $request)
    {
        try{
           //buat slug
            $slug = str_slug($request->judul_id,'-');

            // dd($request->all());
            //store ke db tourism Art & craft
            $data = TourismCulinary::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL,
                'slug' => $slug
            ]);


            $data2 = TourismCulinary::get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismCulinary/'.$data->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismCulinary/'.$data->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.png';
                    $path = public_path()."/uploads/TourismCulinary/".$data->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismCulinary::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!File::exists(public_path().'/uploads/TourismCulinary/'.$data->id.'/gallery/')){
                                File::makeDirectory(public_path().'/uploads/TourismCulinary/'.$data->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismCulinary/'.$data->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $data->id,
                                'tipe_tabel' => 'tourism_tm_culinary',
                                'file_img' => $gallery
                            ]);
                        }else{
                            $gallery = '';
                        }
                    }
                }
                
                TourismRelasiTags::create([
                    'id_tag' => "3",
                    'id_relasi' => $data->id,
                    'tipe_tabel' => 'tourism_tm_culinary'
                ]);
                TourismRelasiSubKategori::create([
                    'id_sub' => "2",
                    'id_relasi' => $data->id,
                    'tipe_tabel' => 'tourism_tm_culinary'
                ]);

                if ($request->toko){
                    foreach ($request->toko as $item => $v) {
                        TourismCulinaryResto::create([
                            'id_culinary' => $data->id,
                            'id_resto' => $v
                        ]);
                    }
                }

                return view('adminpage.tourism.culinary',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah data '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.culinary',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah data '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismCulinary::get();
            return view('adminpage.tourism.culinary',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data : Silahkan gunakan judul lain']);
        }
    }

    public function TourismCulinaryHomepage(Request $request)
    {
        $data = TourismCulinary::where('id','=',$request->id)
            ->first();
        if ($data->is_homepage == 1){
            $data2 = TourismCulinary::where('id','=',$request->id)
                ->update(['is_homepage' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = TourismCulinary::where('id','=',$request->id)
                ->update(['is_homepage' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }

    public function TourismCulinaryDelete(Request $request)
    {
        $data = TourismCulinary::where('id','=',$request->id)->first();
        if ($data){
            TourismRelasiSubKategori::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_culinary')->delete();
            TourismRelasiTags::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_culinary')->delete();
            TourismRelasiImg::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_culinary')->delete();
            TourismCulinaryResto::where('id_culinary','=',$request->id)->delete();
            TourismCulinary::where('id','=',$request->id)->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismCulinaryEdit($id)
    {
        $data['data'] = TourismCulinary::where('id','=',$id)->first();
        $data['toko'] = TourismResto::get();
        $data['relasiToko'] = TourismCulinaryResto::where('id_culinary','=',$id)->get();
        $data['galleries']  = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_culinary')
                ->where('id_relasi', '=', $id)
                ->get();
        return view('adminpage.tourism.culinary_edit',$data);
    }

    public function TourismCulinaryUpdate(Request $request)
    {
        try {
            $slug = str_slug($request->judul_id,'-');

            $data = TourismCulinary::where('id','=',$request->id)
            ->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL,
                'slug' => $slug
            ]);

            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/Uploads/TourismCulinary/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/Uploads/TourismCulinary/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = 'thumb_'.$request->id.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/Uploads/TourismCulinary/'.$request->id.'/', $name);
                $img = $name;
                $data = TourismCulinary::where('id','=',$request->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
            }else{

            }

            if(!empty($request['remove_gallery'])){
                TourismRelasiImg::whereIn('id',$request->remove_gallery)->delete();
            }
            if($request->repeater)
            {
                foreach ($request['repeater'] as $key => $v){
                    if ($request->hasFile('repeater.'.$key.'.gallery')){
                        if(!Storage::exists(public_path().'/Uploads/TourismCulinary/'.$request->id.'/gallery/')){
                            Storage::makeDirectory(public_path().'/Uploads/TourismCulinary/'.$request->id.'/gallery/');
                        }
                        $file = $request->file('repeater.'.$key.'.gallery');
                        $name = 'gallery'.$key.'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Uploads/TourismCulinary/'.$request->id.'/gallery/', $name);
                        $gallery = $name;
                        TourismRelasiImg::create([
                            'id_relasi' => $request->id,
                            'tipe_tabel' => 'tourism_tm_culinary',
                            'file_img' => $gallery
                        ]);
                    }else{
                        $gallery = '';
                    }
                }
            }

           

            if ($request->toko){
                TourismCulinaryResto::where('id_culinary','=',$request->id)->delete();
                foreach ($request->toko as $item => $v) {
                    TourismCulinaryResto::create([
                        'id_culinary' => $request->id,
                        'id_resto' => $v
                    ]);
                }
            }


            $data2 = TourismCulinary::get();
            if ($data){
                return view('adminpage.tourism.culinary',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Culinary '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.culinary',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Culinary '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismCulinary::get();
            return view('adminpage.tourism.culinary',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data : Silahkan gunakan judul lain']);
        }
    }
    
    
}
