<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileReport;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileReportController extends Controller
{

    public function LbftaReport()
    {
        // $lang = "id";
        $data = ProfileReport::orderBy('tanggal', 'desc')->get();
        return view('adminpage.lbfta.report',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaReportAdd()
    {
    	return view('adminpage.lbfta.report_add');
    }

    public function LbftaReportStore(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        $date2 = new DateTime();
        $tgl = $date2->getTimestamp();
        $doc_name = "";
        if($request->hasFile('dokumen_pdf')){
            $doc_name= 'pdf_report_'.$tgl.'.'.$request->dokumen_pdf->getClientOriginalExtension();
            $request->dokumen_pdf->move('pdf/', $doc_name);
        }
        // dd($request->all());
        $data = ProfileReport::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'tanggal' => $date,
                'file_url' => $request->file_url,
                'slug' => $slug,
                'document_pdf' => $doc_name,
            ]);
        
        $data2 = ProfileReport::get(); 
        if ($data){

            // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            return redirect()->route('admin.lbfta.report', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah News ']);
        }else{
            
            return redirect()->route('admin.lbfta.report',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah News ']);
        }
    }

    public function LbftaReportEdit($id)
    {
        // $lang = "id";
        $data = ProfileReport::where('id','=',$id)
        ->first();
        return view('adminpage.lbfta.report_edit',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaReportUpdate(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        $date2 = new DateTime();
        $tgl = $date2->getTimestamp();
            // dd($request->all());
        $data = ProfileReport::where('id', $request->id)->first();
        if($data){
            if($request->hasFile('dokumen_pdf')){
                $doc_name= 'pdf_newsrealease_'.$tgl.'.'.$request->dokumen_pdf->getClientOriginalExtension();
                $request->dokumen_pdf->move('pdf/', $doc_name);
                $data->document_pdf = $doc_name;
            }
            $data->judul_id = $request->judul_id;
            $data->judul_en = $request->judul_en;
            $data->judul_cn = $request->judul_cn;
            $data->deskripsi_id = $request->deskripsi_id;
            $data->deskripsi_en = $request->deskripsi_en;
            $data->deskripsi_cn = $request->deskripsi_cn;
            $data->tanggal = $date;
            $data->file_url = $request->file_url;
            $data->slug = $slug;
            $data2 = ProfileReport::get(); 
            if ($data->save()){
                return redirect()->route('admin.lbfta.report', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit Report ']);
            }else{
                
                return redirect()->route('admin.lbfta.report',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit Report ']);
            }
        }else{
            //return redirect()->route('admin.lbfta.report',['data' => $data2,'status'=> -1,'status_message' => 'Data Tidak Ditemukan ']);
        }
        // dd($request->all());
        
    }

    public function LbftaReportDelete(Request $request)
    {
        $data = ProfileReport::where('id', $request->id)->delete();
        
        $data2 = ProfileReport::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }
    
}
