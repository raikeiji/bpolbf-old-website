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

class TourismAnnouncementController extends Controller
{

    public function TourismPengumuman()
    {
        // $lang = "id";
        $data = TourismAnouncement::get();
        return view('adminpage.tourism.pengumuman',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function TourismPengumumanAdd()
    {
    	return view('adminpage.tourism.pengumuman_add');
    }

    public function TourismPengumumanEdit($id)
    {
        $data = TourismAnouncement::where('id','=',$id)->first();
        return view('adminpage.tourism.pengumuman_edit',['data' => $data]);
    }

    public function TourismPengumumanEditDB(Request $request)
    {
        try {
            $d = Carbon::parse($request->tanggal);
            $slug = str_slug($request->judul_id,'-');

            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/TourismAnnouncement/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/uploads/TourismAnnouncement/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/TourismAnnouncement/', $name);
                $img = $name;
                $data = TourismAnouncement::where('id','=',$request->id)
                    ->update([
                        'author' => $request->author,
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                        'tanggal' => $d->format('Y-m-d'),
                        'image' => $img,
                        'slug' => $slug,
                    ]);
            }else{
                $data = TourismAnouncement::where('id','=',$request->id)
                    ->update([
                        'author' => $request->author,
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                        'tanggal' => $d->format('Y-m-d'),
                        'slug' => $slug,
                    ]);
            }

            $data2 = TourismAnouncement::get();
            if ($data){
                return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Announcement '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Announcement '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismAnouncement::get(); 
            return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Announcement : Silahkan gunakan judul lain']);
        }
    }

    public function TourismPengumumanActive(Request $request)
    {
        $data = TourismAnouncement::where('id','=',$request->id)
            ->first();
        if ($data->isactive == 1){
            $data2 = TourismAnouncement::where('id','=',$request->id)
                ->update(['isactive' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $jumlah_active=TourismAnouncement::where('isactive',1)->count();
            if ($jumlah_active<3){
                $data2 = TourismAnouncement::where('id','=',$request->id)
                    ->update(['isactive' => 1]);
                if ($data2){
                    return 1;
                }
            } else {
                return 0;
            }
        }
        // return 0;
        return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses Merubah Status ']);
    }

    public function TourismPengumumanStore(Request $request)
    {
        try {
        // $date = Carbon::parse($request->tanggal);
            $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
            $slug = str_slug($request->judul_id,'-');

            $data = TourismAnouncement::create([
                    'author' => $request->author,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'tanggal' => $date,
                    // 'isactive' => 0,
                    'slug' => $slug
                ]);
            
            $data2 = TourismAnouncement::get(); 
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/TourismAnnouncement/')){
                        File::makeDirectory(public_path().'/uploads/TourismAnnouncement/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/TourismAnnouncement/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    $data = TourismAnouncement::where('id','=',$data->id)
                        ->update([
                            'thumbnail' => $img
                        ]);
                }else{
                    $img = '';
                }

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.t.pengumuman', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            }else{
                
                return redirect()->route('admin.t.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            }
        } catch (\Exception $e) {
            $data2 = TourismAnouncement::get(); 
            return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Announcement : Silahkan gunakan judul lain']);
        }
    }

    public function TourismPengumumanDelete(Request $request)
    {
        // delete data
        $deleteQuery = TourismAnouncement::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }
    
}
