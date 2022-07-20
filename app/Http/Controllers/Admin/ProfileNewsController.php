<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileNews;
use App\ProfileNewsTags;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileNewsController extends Controller
{

    public function LbftaNewsRelease()
    {
        // $lang = "id";
        $data = ProfileNews::orderBy('tanggal', 'desc')->get();
        return view('adminpage.lbfta.news_release',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaNewsReleaseAdd()
    {
    	return view('adminpage.lbfta.news_release_add');
    }

    public function LbftaNewsReleaseStore(Request $request)
    {
        try{
            // $date = Carbon::parse($request->tanggal);
            $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
            $slug = str_slug($request->judul_id,'-');
            $doc_name = "";
            if($request->hasFile('dokumen_pdf')){
                $doc_name= 'pdf_news_realese_'.$slug.'.'.$request->dokumen_pdf->getClientOriginalExtension();
                $request->dokumen_pdf->move('pdf/', $doc_name);
            }
            // dd($request->all());
            $data = ProfileNews::create([
                    'author' => $request->author,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'tanggal' => $date,
                    'slug' => $slug,
                    'document_pdf' => $doc_name,
                ]);
            
            //create per tag
            if($request->tag)
            {
                foreach ($request['tag'] as $key => $v){
                    $tags = ProfileNewsTags::create([
                        'id_news' => $data->id,
                        'tag' => $v,
                    ]);
                }
            }
            
            $data2 = ProfileNews::get(); 
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/ProfileNews/')){
                        File::makeDirectory(public_path().'/uploads/ProfileNews/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/ProfileNews/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    $data = ProfileNews::where('id','=',$data->id)
                        ->update([
                            'image' => $img
                        ]);
                }else{
                    $img = '';
                }

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.lbfta.news_release', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah News ']);
            }else{
                
                return redirect()->route('admin.lbfta.news_release',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah News ']);
            }
        } catch (\Exception $e) {
            $data2 = ProfileNews::get(); 
            return redirect()->route('admin.lbfta.news_release',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah News : Silahkan gunakan judul yang lain']);
        }
    }
    

    public function LbftaNewsReleaseEdit($id)
    {
        // $lang = "id";
        $data = ProfileNews::where('id','=',$id)
        ->first();
        $tags = ProfileNewsTags::where('id_news',$id)->get();
        return view('adminpage.lbfta.news_release_edit',['data' => $data,'tags' => $tags,'status'=> 0,'status_message' => '']);
    }

    public function LbftaNewsReleaseUpdate(Request $request)
    {
        try {
            // $date = Carbon::parse($request->tanggal);
            $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
            $slug = str_slug($request->judul_id,'-');
            $date2 = new DateTime();
            $tgl = $date2->getTimestamp();
            // dd($request->all());
            $data = ProfileNews::where('id', $request->id)->first();
            if($data){
                if($request->hasFile('dokumen_pdf')){
                    $doc_name= 'pdf_newsrealease_'.$slug.'.'.$request->dokumen_pdf->getClientOriginalExtension();
                    $request->dokumen_pdf->move('pdf/', $doc_name);
                    $data->document_pdf = $doc_name;
                }
                $data->author = $request->author;
                $data->judul_id = $request->judul_id;
                $data->judul_en = $request->judul_en;
                $data->judul_cn = $request->judul_cn;
                $data->deskripsi_id = $request->deskripsi_id;
                $data->deskripsi_en = $request->deskripsi_en;
                $data->deskripsi_cn = $request->deskripsi_cn;
                $data->tanggal = $date;
                $data->slug = $slug;
                $data->save();
            }
            $updateQuery = ProfileNewsTags::where('id_news',$request->id)->delete();

            //create per program
            if($request->tag)
            {
                foreach ($request['tag'] as $key => $v){
                    $tags = ProfileNewsTags::create([
                        'id_news' => $request->id,
                        'tag' => $v,
                    ]);
                }
            }

            $data2 = ProfileNews::get(); 
            if ($data){
                if ($request->hasfile('img')){
                    if(!File::exists(public_path().'/uploads/ProfileNews/')){
                        File::makeDirectory(public_path().'/uploads/ProfileNews/');
                    }

                    $image = $request->imagebase64;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);

                    $image = base64_decode($image);
                    $image_name= 'thumb_'.Carbon::now()->format('YmdHis').'.jpg';
                    $path = public_path()."/uploads/ProfileNews/".$image_name;
                    file_put_contents($path, $image);

                    $img = $image_name;
                    $data = ProfileNews::where('id','=',$request->id)
                        ->update([
                            'image' => $img
                        ]);
                }else{
                    $img = '';
                }

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.lbfta.news_release', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit News ']);
            }else{
                return redirect()->route('admin.lbfta.news_release',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit News ']);
            }
        } catch (\Exception $e) {
            $data2 = ProfileNews::get(); 
            return redirect()->route('admin.lbfta.news_release',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit News : Silahkan gunakan judul yang lain']);
        }
    }

    public function LbftaNewsReleaseDelete(Request $request)
    {
        $data = ProfileNews::where('id', $request->id)->delete();

        $deleteQuery = ProfileNewsTags::where('id_news',$request->id)->delete();

        $data2 = ProfileNews::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
