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


class TourismEnchantingEvtController extends Controller
{

    public function TourismELBEvent()
    {
        $data = TourismEvent::where('kategori','=','labuan')->get();
        return view('adminpage.tourism.elb_event',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function TourismELBEventAdd()
    {
        $data['destinations'] = TourismDestination::select('id', 'judul_id', 'alamat')->get();
        $data['productions'] = TourismRumahProduksi::select('id', 'nama', 'alamat')->get();
        $data['restos'] = TourismResto::select('id', 'nama', 'alamat')->get();
        $data['tags'] = TourismTags::get();
        $data['subkategori'] = TourismSubKategori::get();
        $data['region'] = TourismRegion::get();
        return view('adminpage.tourism.elb_event_add',$data);
    }

    public function TourismELBEventStore(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id);
            // $date = Carbon::createFromFormat("m-d-Y H:i", $request->waktu_event);
            // dd($date);
            $start_date = explode(" - ",$request->waktu_event)[0];
            $end_date = explode(" - ",$request->waktu_event)[1];

            $data = TourismEvent::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'slug' => $slug,
                'video_url' => $request->URL,
                'waktu_event' => Carbon::createFromFormat("m-d-Y H:i", $start_date),
                'waktu_event_end' => Carbon::createFromFormat("m-d-Y H:i", $end_date),
                'status_event' => $request->jenis_event,
                'url_tiket' => $request->url_tiket,
                'penyelenggara' => $request->penyelenggara,
                'kategori' => 'labuan',
                'id_region' => $request->region,
                'id_relasi' => $request->alamat,
                'tipe_tabel' => 'tourism_tm_event'
            ]);

            $data2 = TourismEvent::where('kategori','=','labuan')->get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismEvent/ELB/'.$data->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismEvent/ELB/'.$data->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/TourismEvent/ELB/".$data->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismEvent::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                if(!empty($request['repeater'])){
                    foreach ($request['repeater'] as $key => $v){
                        if ($request->hasFile('repeater.'.$key.'.gallery')){
                            if(!File::exists(public_path().'/uploads/TourismEvent/ELB/'.$data->id.'/gallery/')){
                                File::makeDirectory(public_path().'/uploads/TourismEvent/ELB/'.$data->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismEvent/ELB/'.$data->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $data->id,
                                'tipe_tabel' => 'tourism_tm_event',
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
                            'tipe_tabel' => 'tourism_tm_event'
                        ]);
                    }
                }
                return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismEvent::where('kategori','=','labuan')->get();
            return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mendambahkan data : Silahkan gunakan judul lain']);
        }
    }

    public function TourismELBEventDelete(Request $request)
    {
        $data = TourismEvent::where('id','=',$request->id)
            ->where('kategori','=','labuan')->delete();
        if ($data){
            TourismRelasiSubKategori::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_event')->delete();
            TourismRelasiTags::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_event')->delete();
            TourismRelasiImg::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_event')->delete();
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismELBEventEdit($id)
    {
        $data['data'] = TourismEvent::where('id','=',$id)->first();
        $data['tags'] = TourismTags::get();
        $data['relasi_tag'] = TourismRelasiTags::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_event')->get();
        $data['subkategori'] = TourismSubKategori::where('nama_kategori_id','like','%Things To%')->get();
        $data['relasi_sub'] = TourismRelasiSubKategori::where('id_relasi','=',$id)
            ->where('tipe_tabel','=','tourism_tm_event')->get();
        $data['region'] = TourismRegion::get();
        $data['destinations'] = TourismDestination::select('id', 'judul_id', 'alamat')->get();
        $data['productions'] = TourismRumahProduksi::select('id', 'nama', 'alamat')->get();
        $data['restos'] = TourismResto::select('id', 'nama', 'alamat')->get();

        $data['galleries']  = DB::table('tourism_tr_relasi_img')
                ->where('tipe_tabel', '=', 'tourism_tm_event')
                ->where('id_relasi', '=', $id)
                ->get();

        return view('adminpage.tourism.elb_event_edit',$data);
    }

    public function TourismELBEventUpdate(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id);
            // $date = Carbon::createFromFormat("m-d-Y H:i", $request->waktu_event);
            // dd($date);
            $start_date = explode(" - ",$request->waktu_event)[0];
            $end_date = explode(" - ",$request->waktu_event)[1];
            
            $data = TourismEvent::where('id','=',$request->id)
            ->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'slug' => $slug,
                'video_url' => $request->URL,
                'waktu_event' => Carbon::createFromFormat("m-d-Y H:i", $start_date),
                'waktu_event_end' => Carbon::createFromFormat("m-d-Y H:i", $end_date),
                'status_event' => $request->jenis_event,
                'url_tiket' => $request->url_tiket,
                'penyelenggara' => $request->penyelenggara,
                'kategori' => 'labuan',
                'id_region' => $request->region,
                'id_relasi' => $request->alamat,
                'tipe_tabel' => $request->tipe_tabel
            ]);

            $data2 = TourismEvent::where('kategori','=','labuan')->get();
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismEvent/ELB/'.$request->id.'/')){
                        File::makeDirectory(public_path().'/uploads/TourismEvent/ELB/'.$request->id.'/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/TourismEvent/ELB/".$request->id."/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    TourismEvent::where('id','=',$request->id)
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
                            if(!File::exists(public_path().'/uploads/TourismEvent/ELB/'.$request->id.'/gallery/')){
                                File::makeDirectory(public_path().'/uploads/TourismEvent/ELB/'.$request->id.'/gallery/');
                            }
                            $file = $request->file('repeater.'.$key.'.gallery');
                            $name = 'gallery_'.Carbon::now()->format('YmdHis').$key.'.'.$file->getClientOriginalExtension();
                            $file->move(public_path().'/uploads/TourismEvent/ELB/'.$request->id.'/gallery/', $name);
                            $gallery = $name;
                            TourismRelasiImg::create([
                                'id_relasi' => $request->id,
                                'tipe_tabel' => 'tourism_tm_event',
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
                                'tipe_tabel' => 'tourism_tm_event'
                            ]);
                        }
                    }
                }

                return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismEvent::where('kategori','=','labuan')->get();
            return view('adminpage.tourism.elb_event',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit data : Silahkan gunakan judul lain']);
        }
    }
    
}
