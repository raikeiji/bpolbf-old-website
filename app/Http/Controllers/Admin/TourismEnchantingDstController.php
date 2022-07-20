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

class TourismEnchantingDstController extends Controller
{

    public function TourismELBDestinasi()
    {
        $data = TourismDestination::where('kategori','=','labuan')->get();
        return view('adminpage.tourism.elb_destinasi',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function TourismELBDestinasiAdd()
    {
        $data['tags'] = TourismTags::get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','like','%Things To%')->get();
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.elb_destinasi_add',$data);
    }

    public function TourismELBDestinasiStore(Request $request)
    {
        try{
            //buat slug
            $slug = str_slug($request->judul_id,'-');

            // dd($request->all());

            //store ke db tourism destinasi
            $data = TourismDestination::create([
            'region_id' => $request->region,
            'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'panduan_perjalanan_id' => $request->panduan_perjalanan_id,
                'panduan_perjalanan_en' => $request->panduan_perjalanan_en,
                'panduan_perjalanan_cn' => $request->panduan_perjalanan_cn,
                'thumbnail' => '',
                'video_url' => $request->URL,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'jam_buka' => $request->jam_buka,
                'nomor_telepon' => $request->kontak,
                'kategori' => 'labuan',
                'slug' => $slug,
                'url_repuso' => $request->url_repulso,
                'is_homepage' => 0
            ]);

            $data2 = TourismDestination::where('kategori','=','labuan')->get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismDestinasi/ELB/'.$data->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismDestinasi/ELB/'.$data->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.png';
                    $path = public_path()."/uploads/TourismDestinasi/ELB/".$data->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismDestination::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!Storage::exists(public_path().'/uploads/TourismDestinasi/ELB/'.$data->id.'/gallery/')){
                                Storage::makeDirectory(public_path().'/uploads/TourismDestinasi/ELB/'.$data->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismDestinasi/ELB/'.$data->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $data->id,
                                'tipe_tabel' => 'tourism_tm_destination',
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
                            'tipe_tabel' => 'tourism_tm_destination'
                        ]);
                    }
                }
                
                if ($request->subkategori){
                    foreach ($request->subkategori as $s => $v){
                        TourismRelasiSubKategori::create([
                            'id_sub' => $v,
                            'id_relasi' => $data->id,
                            'tipe_tabel' => 'tourism_tm_destination'
                        ]);
                    }
                }
                return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah data '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah data '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismDestination::where('kategori','=','labuan')->get();
            return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah data : Silahkan gunakan judul lain']);
        }
    }

    public function TourismELBDestinasiDelete(Request $request)
    {
        $data = TourismDestination::where('id','=',$request->id)
            ->where('kategori','=','labuan')->delete();
        if ($data){
            TourismRelasiSubKategori::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_destination')->delete();
            TourismRelasiTags::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_destination')->delete();
            TourismRelasiImg::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_destination')->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismELBDestinasiActive(Request $request)
    {
        $data = TourismDestination::where('id','=',$request->id)
            ->first();
        if ($data->is_homepage == 1){
            $data2 = TourismDestination::where('id','=',$request->id)
                ->update(['is_homepage' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = TourismDestination::where('id','=',$request->id)
                ->update(['is_homepage' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }

    public function TourismELBDestinasiEdit($id)
    {
        $data['data'] = TourismDestination::where('id','=',$id)->first();
        $data['tags'] = TourismTags::get();
        $data['relasi_tag'] = TourismRelasiTags::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_destination')->get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','like','%Things To%')->get();
        $data['relasi_sub'] = TourismRelasiSubKategori::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_destination')->get();
        $data['region'] = TourismRegion::get();

        $data['galleries']  = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_destination')
                ->where('id_relasi', '=', $id)
                ->get();

        return view('adminpage.tourism.elb_destinasi_edit',$data);
    }

    public function TourismELBDestinasiUpdate(Request $request)
    {
        try{
            //buat slug
            $slug = str_slug($request->judul_id,'-');

            // dd($request->all());

            //store ke db tourism destinasi
            $data = TourismDestination::where('id','=',$request->id)
            ->update([
            'region_id' => $request->region,
            'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'panduan_perjalanan_id' => $request->panduan_perjalanan_id,
                'panduan_perjalanan_en' => $request->panduan_perjalanan_en,
                'panduan_perjalanan_cn' => $request->panduan_perjalanan_cn,
                'video_url' => $request->URL,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'jam_buka' => $request->jam_buka,
                'nomor_telepon' => $request->kontak,
                'kategori' => 'labuan',
                'slug' => $slug,
                'url_repuso' => $request->url_repulso
            ]);

            $data2 = TourismDestination::where('kategori','=','labuan')->get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismDestinasi/ELB/'.$request->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismDestinasi/ELB/'.$request->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.png';
                    $path = public_path()."/uploads/TourismDestinasi/ELB/".$request->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismDestination::where('id','=',$request->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['remove_gallery'])){
                    TourismRelasiImg::whereIn('id',$request->remove_gallery)->delete();
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!Storage::exists(public_path().'/uploads/TourismDestinasi/ELB/'.$request->id.'/gallery/')){
                                Storage::makeDirectory(public_path().'/uploads/TourismDestinasi/ELB/'.$request->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismDestinasi/ELB/'.$request->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $request->id,
                                'tipe_tabel' => 'tourism_tm_destination',
                                'file_img' => $gallery
                            ]);
                        }else{
                            $gallery = '';
                        }
                    }
                }

                if ($request->tag){
                    TourismRelasiTags::where('id_relasi','=',$request->id)->delete();
                    if (!empty($request->tag)){
                        foreach ($request->tag as $t => $v){
                            TourismRelasiTags::create([
                                'id_tag' => $v,
                                'id_relasi' => $request->id,
                                'tipe_tabel' => 'tourism_tm_destination'
                            ]);
                        }
                    }
                }

                if ($request->subkategori){
                    TourismRelasiSubKategori::where('id_relasi','=',$request->id)->delete();
                    if (!empty($request->subkategori)){
                        foreach ($request->subkategori as $s => $v){
                            TourismRelasiSubKategori::create([
                                'id_sub' => $v,
                                'id_relasi' => $request->id,
                                'tipe_tabel' => 'tourism_tm_destination'
                            ]);
                        }
                    }
                }
                return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit data '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismDestination::where('kategori','=','labuan')->get();
            return view('adminpage.tourism.elb_destinasi',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data : Silahkan gunakan judul lain']);
        }
    }
    
}
