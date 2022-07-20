<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TourismArtCraft;
use App\TourismCulinary;
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

class TourismBeyondArtController extends Controller
{

    public function TourismBLBArt()
    {
        $data = TourismArtCraft::where('kategori','=','beyond')->get();
        return view('adminpage.tourism.blb_art',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function TourismBLBArtAdd()
    {
        $data['tags'] = TourismTags::get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','like','%Things To%')->get();
        $data['toko'] = TourismRumahProduksi::get();
        return view('adminpage.tourism.blb_art_add',$data);
    }

    public function TourismBLBArtStore(Request $request)
    {
        try {
            //buat slug
            $slug = str_slug($request->judul_id,'-');

            // dd($request->all());
            //store ke db tourism Art & craft
            $data = TourismArtCraft::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL,
                'kategori' => 'beyond',
                'slug' => $slug,
                'tipe_tabel' => 'tourism_tm_art_craft',
                'is_homepage' => 0
            ]);


            $data2 = TourismArtCraft::where('kategori','=','beyond')->get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismArtCraft/BLB/'.$data->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismArtCraft/BLB/'.$data->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.png';
                    $path = public_path()."/uploads/TourismArtCraft/BLB/".$data->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismArtCraft::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!File::exists(public_path().'/uploads/TourismArtCraft/BLB/'.$data->id.'/gallery/')){
                                File::makeDirectory(public_path().'/uploads/TourismArtCraft/BLB/'.$data->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismArtCraft/BLB/'.$data->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $data->id,
                                'tipe_tabel' => 'tourism_tm_art_craft',
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
                            'tipe_tabel' => 'tourism_tm_art_craft'
                        ]);
                    }
                }

                if ($request->subkategori){
                    foreach ($request->subkategori as $s => $v){
                        TourismRelasiSubKategori::create([
                            'id_sub' => $v,
                            'id_relasi' => $data->id,
                            'tipe_tabel' => 'tourism_tm_art_craft'
                        ]);
                    }
                }

                if ($request->toko){
                    foreach ($request->toko as $item => $v) {
                        TourismTokoArtCraft::create([
                            'id_art_craft' => $data->id,
                            'id_toko' => $v
                        ]);
                    }
                }

                return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah data '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah data '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            error_log($e);
            $data2 = TourismArtCraft::where('kategori','=','beyond')->get();
            return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah data : Silahkan gunakan judul lain']);
        }
    }

    public function TourismBLBArtHomepage(Request $request)
    {
        $data = TourismArtCraft::where('id','=',$request->id)
            ->first();
        if ($data->is_homepage == 1){
            $data2 = TourismArtCraft::where('id','=',$request->id)
                ->update(['is_homepage' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = TourismArtCraft::where('id','=',$request->id)
                ->update(['is_homepage' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }

    public function TourismBLBArtDelete(Request $request)
    {
        TourismTokoArtCraft::where('id_art_craft','=',$request->id)->delete();
        $data = TourismArtCraft::where('id','=',$request->id)
            ->where('kategori','=','beyond')->delete();
        if ($data){
            TourismRelasiSubKategori::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_art_craft')->delete();
            TourismRelasiTags::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_art_craft')->delete();
            TourismRelasiImg::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_art_craft')->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismBLBArtEdit($id)
    {
        $data['data'] = TourismArtCraft::where('id','=',$id)->first();
        $data['tags'] = TourismTags::get();
        $data['relasi_tag'] = TourismRelasiTags::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_art_craft')->get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','like','%Things To%')->get();
        $data['relasi_sub'] = TourismRelasiSubKategori::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_art_craft')->get();
        $data['toko'] = TourismRumahProduksi::get();
        $data['relasiToko'] = TourismTokoArtCraft::where('id_art_craft','=',$id)->get();
        $data['galleries']  = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_art_craft')
                ->where('id_relasi', '=', $id)
                ->get();
        return view('adminpage.tourism.blb_art_edit',$data);
    }

    public function TourismBLBArtUpdate(Request $request)
    {
        try {
            $slug = str_slug($request->judul_id,'-');

            $data = TourismArtCraft::where('id','=',$request->id)
            ->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL,
                'tipe_tabel' => 'tourism_tm_art_craft',
                'slug' => $slug,
            ]);

            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/Uploads/TourismArtCraft/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/Uploads/TourismArtCraft/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = 'thumb_'.$request->id.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/Uploads/TourismArtCraft/'.$request->id.'/', $name);
                $img = $name;
                $data = TourismArtCraft::where('id','=',$request->id)
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
                        if(!Storage::exists(public_path().'/Uploads/TourismArtCraft/BLB/'.$request->id.'/gallery/')){
                            Storage::makeDirectory(public_path().'/Uploads/TourismArtCraft/BLB/'.$request->id.'/gallery/');
                        }
                        $file = $request->file('repeater.'.$key.'.gallery');
                        $name = 'gallery'.$key.'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/Uploads/TourismArtCraft/BLB/'.$request->id.'/gallery/', $name);
                        $gallery = $name;
                        TourismRelasiImg::create([
                            'id_relasi' => $request->id,
                            'tipe_tabel' => 'tourism_tm_art_craft',
                            'file_img' => $gallery
                        ]);
                    }else{
                        $gallery = '';
                    }
                }
            }

            if ($request->tag){
                TourismRelasiTags::where('id_relasi','=',$request->id)
                    ->where('tipe_tabel','=','tourism_tm_art_craft')->delete();
                foreach ($request->tag as $t => $v){
                    TourismRelasiTags::create([
                        'id_tag' => $v,
                        'id_relasi' => $request->id,
                        'tipe_tabel' => 'tourism_tm_art_craft'
                    ]);
                }
            }

            if ($request->toko){
                TourismTokoArtCraft::where('id_art_craft','=',$request->id)->delete();
                foreach ($request->toko as $item => $v) {
                    TourismTokoArtCraft::create([
                        'id_art_craft' => $request->id,
                        'id_toko' => $v
                    ]);
                }
            }

            if ($request->subkategori){
                TourismRelasiSubKategori::where('id_relasi','=',$request->id)
                    ->where('tipe_tabel','=','tourism_tm_art_craft')->delete();
                foreach ($request->subkategori as $s => $v){
                    TourismRelasiSubKategori::create([
                        'id_sub' => $v,
                        'id_relasi' => $request->id,
                        'tipe_tabel' => 'tourism_tm_art_craft'
                    ]);
                }
            }

            $data2 = TourismArtCraft::where('kategori','=','beyond')->get();
            if ($data){
                return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Announcement '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Announcement '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismArtCraft::where('kategori','=','beyond')->get();
            return view('adminpage.tourism.blb_art',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data : Silahkan gunakan judul lain']);
        }
    }
    
}
