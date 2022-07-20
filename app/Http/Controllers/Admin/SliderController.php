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

class SliderController extends Controller
{

    public function TourismSlider()
    {
        $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 1)->get();
        return view('adminpage.tourism.slider',['slider' => $resultQuery,'status'=> 0,'status_message' => '']);
    }

    public function TourismSliderAdd()
    {
    	return view('adminpage.tourism.slider_add');
    }

    public function TourismSliderDownload($id_img)
    {
        $img = TourismRelasiImg::where('id',$id_img)->firstorfail();
        $filepath = public_path().'/uploads/SliderTourism/'.$img->id_relasi.'/'.$img->file_img;
        return Response::download($filepath);
    }

    public function TourismSliderAddDB(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/SliderTourism/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderTourism/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderTourism/', $name);
                $img = $name;
            }else{
                $img = '';
            }
            
            $slug = str_slug($request->judul_id,'-');

            $slider = Slider::create([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'page_id' => 1,
                'file_img' => $img
            ]);
            
            $insert_id = $slider->id;

            $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 1)->get();
            if ($slider) {
                // returns true
                return view('adminpage.tourism.slider',['slider' => $resultQuery,'status'=> 1,'status_message' => 'Sukses menambahkan slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.tourism.slider',['slider' => $resultQuery,'status'=> -1,'status_message' => 'Error menambahkan slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 1)->get();
            return view('adminpage.tourism.slider',['slider' => $resultQuery,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function TourismSliderActive(Request $request)
    {
        $data = Slider::where('id','=',$request->id)
            ->first();
        if ($data->active == 1){
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }

    public function TourismSliderDelete(Request $request)
    {
        // delete data
        $deleteImg = DB::table('tourism_tr_relasi_img')->where('id_relasi','=',$request->id)->where('tipe_tabel','=','tm_slider')->delete();
        $deleteQuery = DB::table('tm_slider')->where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function TourismSliderEdit($id)
    {
        $data = DB::table('tm_slider')
            ->where('tm_slider.id','=',$id)
            ->first();
        return view('adminpage.tourism.slider_edit',['data' => $data]);
    }

    public function TourismSliderEditDB(Request $request)
    {
        try {
            $slug = str_slug($request->judul_id,'-');

            if ($request->hasfile('img')){
                $current_img = DB::table('tm_slider')->select('file_img')->where('tm_slider.id','=',$request->id)->first();

                if(!Storage::exists(public_path().'/uploads/SliderTourism/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderTourism/');
                }
                File::delete($current_img);
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderTourism/', $name);
                $img = $name;

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'file_img' => $img
                ]);
            }else{
                $img = '';

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn
                ]);
            }
            

            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 1)->get();

            if ($data) {
                // returns true
                return view('adminpage.tourism.slider',['slider' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.tourism.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 1)->get();
            return view('adminpage.tourism.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function LbftaSlider()
    {
        $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 3)->get();
        return view('adminpage.lbfta.slider',['slider' => $resultQuery,'status'=> 0,'status_message' => '']);
    }

    public function LbftaSliderAdd()
    {
    	return view('adminpage.lbfta.slider_add');
    }

    public function LbftaSliderEdit($id)
    {
        $data = DB::table('tm_slider')
            ->where('tm_slider.id','=',$id)
            ->first();
        return view('adminpage.lbfta.slider_edit',['data' => $data]);
    }

    public function LbftaSliderAddDB(Request $request)
    {
        try{
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/SliderProfile/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderProfile/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderProfile/', $name);
                $img = $name;
            }else{
                $img = '';
            }
            
            $slug = str_slug($request->judul_id,'-');

            $slider = Slider::create([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'page_id' => 3,
                'file_img' => $img
            ]);
            
            $insert_id = $slider->id;

            $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 3)->get();

            if ($slider) {
                // returns true
                return view('adminpage.lbfta.slider',['slider' => $resultQuery,'status'=> 1,'status_message' => 'Sukses menambahkan slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.lbfta.slider',['slider' => $resultQuery,'status'=> -1,'status_message' => 'Error menambahkan slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 3)->get();

            return view('adminpage.lbfta.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function LbftaSliderEditDB(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id,'-');

            if ($request->hasfile('img')){
                $current_img = DB::table('tm_slider')->select('file_img')->where('tm_slider.id','=',$request->id)->first();

                if(!Storage::exists(public_path().'/uploads/SliderProfile/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderProfile/');
                }
                File::delete($current_img);

                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderProfile/', $name);
                $img = $name;

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'file_img' => $img
                ]);
            }else{
                $img = '';

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn
                ]);
            }

            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 3)->get();

            if ($data) {
                // returns true
                return view('adminpage.lbfta.slider',['slider' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.lbfta.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 3)->get();
            return view('adminpage.lbfta.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function LbftaSliderActive(Request $request)
    {
        $data = Slider::where('id','=',$request->id)
            ->first();
        if ($data->active == 1){
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }


    //investment
    public function InvestmentSlider()
    {
        $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 2)->get();
        return view('adminpage.industri-investment.slider',['slider' => $resultQuery,'status'=> 0,'status_message' => '']);
    }

    public function InvestmentSliderAdd()
    {
    	return view('adminpage.industri-investment.slider_add');
    }

    public function InvestmentSliderEdit($id)
    {
        $data = DB::table('tm_slider')
            ->where('tm_slider.id','=',$id)
            ->first();
        return view('adminpage.industri-investment.slider_edit',['data' => $data]);
    }

    public function InvestmentSliderAddDB(Request $request)
    {
        try{
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/SliderInvestment/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderInvestment/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderInvestment/', $name);
                $img = $name;
            }else{
                $img = '';
            }
            
            $slug = str_slug($request->judul_id,'-');

            $slider = Slider::create([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'page_id' => 2,
                'file_img' => $img
            ]);
            
            $insert_id = $slider->id;

            $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 2)->get();

            if ($slider) {
                // returns true
                return view('adminpage.industri-investment.slider',['slider' => $resultQuery,'status'=> 1,'status_message' => 'Sukses menambahkan slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.industri-investment.slider',['slider' => $resultQuery,'status'=> -1,'status_message' => 'Error menambahkan slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            error_log($e);
            $resultQuery = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 2)->get();

            return view('adminpage.industri-investment.slider',['slider' => $resultQuery,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function InvestmentSliderEditDB(Request $request)
    {
        try{
            $slug = str_slug($request->judul_id,'-');

            if ($request->hasfile('img')){
                $current_img = DB::table('tm_slider')->select('file_img')->where('tm_slider.id','=',$request->id)->first();

                if(!Storage::exists(public_path().'/uploads/SliderInvestment/')){
                    Storage::makeDirectory(public_path().'/uploads/SliderInvestment/');
                }
                File::delete($current_img);

                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/SliderInvestment/', $name);
                $img = $name;

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn,
                    'file_img' => $img
                ]);
            }else{
                $img = '';

                $data = Slider::where('id','=',$request->id)
                ->update([
                    'slug' => $slug,
                    'judul_id' => $request->judul_id,
                    'judul_en' => $request->judul_en,
                    'judul_cn' => $request->judul_cn,
                    'deskripsi_id' => $request->deskripsi_id,
                    'deskripsi_en' => $request->deskripsi_en,
                    'deskripsi_cn' => $request->deskripsi_cn
                ]);
            }

            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 2)->get();

            if ($data) {
                // returns true
                return view('adminpage.industri-investment.slider',['slider' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit slider '.$request->judul_id]);
            }
            else {
                // returns false
                return view('adminpage.industri-investment.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = DB::table('tm_slider')->select('tm_slider.*', 'tm_web_page.nama_page')->leftJoin('tm_web_page', 'tm_web_page.id', '=', 'tm_slider.page_id')->where('tm_slider.page_id', 2)->get();

            return view('adminpage.industri-investment.slider',['slider' => $data2,'status'=> -1,'status_message' => 'Error mengedit slider '.$request->judul_id.', Judul sudah digunakan']);
        }
    }

    public function InvestmentSliderActive(Request $request)
    {
        $data = Slider::where('id','=',$request->id)
            ->first();
        if ($data->active == 1){
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 0]);
            if ($data2){
                return 2;
            }
        }else{
            $data2 = Slider::where('id','=',$request->id)
                ->update(['active' => 1]);
            if ($data2){
                return 1;
            }
        }
        return 0;
    }
    
}
