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
use DateTime;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class TourismVisaController extends Controller
{

    public function TourismInformasiVisa()
    {
        $data = TourismInformasiVisa::get();
        return view('adminpage.tourism.visa',['data' => $data, 'status' => 0]);
    }

    public function TourismInformasiVisaAdd()
    {
        return view('adminpage.tourism.visa_add');
    }

    public function TourismInformasiVisaStore(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id);

            // dd($request->all());
            $date = new DateTime();
            $tgl = $date->getTimestamp();
            $doc_name = "";
            if($request->hasFile('dokumen_pdf')){
                $doc_name= 'pdf_visa_'.$tgl.'.'.$request->dokumen_pdf->getClientOriginalExtension();
                $request->dokumen_pdf->move('pdf/', $doc_name);
            }
            $data = TourismInformasiVisa::create([
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'document_pdf' => $doc_name,
                    'slug' => $slug,
                ]);

            $data2 = TourismInformasiVisa::get();
            if ($data){
                return view('adminpage.tourism.visa',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambahkan Informasi Visa '.$request->judul_id]);
            }else{
                return view('adminpage.tourism.visa',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambahkan Informasi Visa'.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = TourismInformasiVisa::get();
            return view('adminpage.tourism.visa',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambahkan Informasi Visa : SIlahkan gununakan judul lain']);
        }

    }

    public function TourismInformasiVisaActive(Request $request)
    {
        // dd(TourismInformasiVisa::get());
        $data = TourismInformasiVisa::where('id','=',$request->id)
            ->first();
        if ($data->ishomepage == 1){
            $data2 = TourismInformasiVisa::where('id','=',$request->id)
                ->update(['ishomepage' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $jumlah_active=TourismInformasiVisa::where('ishomepage',1)->count();
            if ($jumlah_active<1){
                $data2 = TourismInformasiVisa::where('id','=',$request->id)
                    ->update(['ishomepage' => 1]);
                if ($data2){
                    return 1;
                }
            }else {
                return 0;
            }
        }
        return 0;
        // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses Merubah Status ']);
    }

    public function TourismInformasiVisaDelete(Request $request)
    {
        $data = TourismInformasiVisa::where('id','=',$request->id)->delete();
        if ($data){
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismInformasiVisaEdit($id)
    {
        $data = TourismInformasiVisa::where('id','=',$id)->first();
        return view('adminpage.tourism.visa_edit',['data' => $data]);
    }

    public function TourismInformasiEditStore(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id,'-');
            $date = new DateTime();
            $tgl = $date->getTimestamp();
            $data = TourismInformasiVisa::where('id','=',$request->id)->first();
            if($data){
                if($request->hasFile('dokumen_pdf')){
                    $doc_name= 'pdf_visa_'.$tgl.'.'.$request->dokumen_pdf->getClientOriginalExtension();
                    $request->dokumen_pdf->move('pdf/', $doc_name);
                    $data->document_pdf = $doc_name;
                }
                $data->judul_id = $request->judul_id;
                $data->judul_en = $request->judul_en;
                $data->judul_cn = $request->judul_cn;
                $data->deskripsi_id = $request->deskripsi_id;
                $data->deskripsi_en = $request->deskripsi_en;
                $data->deskripsi_cn = $request->deskripsi_cn;
                
                $data->slug = $slug;
                $data2 = TourismInformasiVisa::get();
                if ($data->save()){
                    return view('adminpage.tourism.visa',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Informasi Visa '.$request->judul_id]);
                }else{
                    return view('adminpage.tourism.visa',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Informasi Visa'.$request->judul_id]);
                }
            }
        } catch (\Exception $e) {
            $data2 = TourismInformasiVisa::get();
            return view('adminpage.tourism.visa',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Informasi Visa : SIlahkan gununakan judul lain']);
        }
    }
    
}
