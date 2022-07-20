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

class TourismRegionController extends Controller
{

    public function TourismRegion()
    {
        $data = TourismRegion::get();
        return view('adminpage.tourism.region',['data' => $data]);
    }

    public function TourismRegionAdd(Request $request)
    {
        $slug = str_slug($request->nama);
        $dataSlug = TourismRegion::where('slug','=',$slug)->first();
        if ($dataSlug){
            return 0;
        }
        $data = TourismRegion::create([
           'nama' => $request->nama,
            'slug' => $slug,
            'lat' => $request->lat,
            'long' => $request->long
        ]);
        if ($data){
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismRegionEdit(Request $request)
    {
        $slug = str_slug($request->nama);
        $update = TourismRegion::where('id',$request->id)->update([
            'nama' => $request->nama,
            'slug' => $slug,
            'lat' => $request->lat,
            'long' => $request->long,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if ($update){
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismRegionDelete(Request $request)
    {
        $data = TourismEvent::where('id_region','=',$request->id)->first();
        if ($data){
            return 0 ;
        }
        $data = TourismDestination::where('region_id','=',$request->id)->first();
        if ($data){
            return 0 ;
        }
        $data = TourismRumahProduksi::where('region_id','=',$request->id)->first();
        if ($data){
            return 0;
        }
        $data = TourismResto::where('region_id','=',$request->id)->first();
        if ($data){
            return 0;
        }

        $data = TourismEvent::where('id_region','=',$request->id)->first();
        if ($data){
            return 0 ;
        }
        $delete = DB::table('tourism_tm_region')->where('id',$request->id)->delete();
        if ($delete){
            return 1;
        }else{
            return 0;
        }
    }
    
}
