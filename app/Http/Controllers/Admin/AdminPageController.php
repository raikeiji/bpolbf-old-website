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

use App\ProfileAbout;
use App\ProfileMission;
use App\ProfileOrganization;
use App\ProfileRespective;
use App\ProfileHN;

use App\InvestmentBerinvestasi;
use App\InvestmentPendanaan;
use App\InvestmentHN;
use App\InvestmentHTI;
use App\InvestmentKomoditas;
use App\InvestmentSektor;
use App\InvestmentBenefitResiko;

use App\Footer;

use Auth;
use File;

class AdminPageController extends Controller
{
    public function index()
    {
    	return view('adminpage.index');
    }

    //Tourism Slider


    //Tourism Announcement
    

    //Tourism Region
    

    //Tourism Informasi Visa
    

    //Tourism Enchanting Labuan Bajo Destinasi
    

    //Tourism Enchanting Labuan Bajo Event
    

    //Tourism Enchanting Labuan Bajo Art & Craft
    

    //Tourism Beyond Labuan Bajo Destinasi


    //Tourism Beyond Labuan Bajo Event
    

    //Tourism Beyond Labuan Bajo Art & Craft
    

    //Tourism Culinary
    

    //Tourism Tour Package
    public function TourismPlantTrip()
    {
        $data = TourismTourPackage::get();
        return view('adminpage.tourism.pyt',['data' => $data, 'status' => 0]);
    }

    public function TourismPlantTripAdd()
    {
        return view('adminpage.tourism.pyt_add');
    }

    public function TourismPlantTripStore(Request $request)
    {
        $slug = str_slug($request->judul_id);

        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/Uploads/PYT/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/Uploads/PYT/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = 'PYT'.$request->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/Uploads/PYT/'.$request->id.'/', $name);
            $img = $name;
        }else{
            $img = '';
        }

        $data = TourismTourPackage::create([
            'slug' => $slug,
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'thumbnail' => $name,
            'video_url' => $request->URL
        ]);

        $image = TourismRelasiImg::create([
                'id_relasi' => $data->id,
                'tipe_tabel' => 'tourism_tm_tour_package',
                'file_img' => $img
            ]);

        $data2 = TourismTourPackage::get();
        if ($data){
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Tour Package '.$request->judul_id]);
        }else{
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Tour Package '.$request->judul_id]);
        }
    }

    public function TourismPlantTripEdit($id)
    {
        $data = TourismTourPackage::where('id','=',$id)->first();
        return view('adminpage.tourism.pyt_edit',['data' => $data]);
    }

    public function TourismPlantTripUpdate(Request $request)
    {
        $slug = str_slug($request->judul_id);

        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/Uploads/PYT/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/Uploads/PYT/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = 'PYT'.$request->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/Uploads/PYT/'.$request->id.'/', $name);
            $img = $name;
            $image = TourismRelasiImg::where('id_relasi','=',$request->id)
                ->where('tipe_tabel','=','tourism_tm_tour_package')
                ->update([
                'file_img' => $img
            ]);
            $data = TourismTourPackage::where('id','=',$request->id)
                ->update([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'thumbnail' => $name,
                'video_url' => $request->URL
            ]);
        }else{
            $img = '';
            $data = TourismTourPackage::where('id','=',$request->id)
                ->update([
                'slug' => $slug,
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'video_url' => $request->URL
            ]);
        }

        $data2 = TourismTourPackage::get();
        if ($data){
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Tour Package '.$request->judul_id]);
        }else{
            return view('adminpage.tourism.pyt',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Tour Package '.$request->judul_id]);
        }
    }

    public function TourismPlantTripDelete(Request $request)
    {
        $data = TourismTourPackage::where('id','=',$request->id)->delete();
        if ($data){
            return 1;
        }else{
            return 0;
        }
    }

    public function TourismHeadlineNews()
    {
    	return view('adminpage.tourism.headline_news');
    }

    public function TourismHeadlineNewsAdd()
    {
    	return view('adminpage.tourism.headline_news_add');
    }

    public function TourismThematic()
    {
    	return view('adminpage.tourism.thematic');
    }

    public function TourismThematicAdd()
    {
    	return view('adminpage.tourism.thematic_add');
    }

    public function TourismEvent()
    {
    	return view('adminpage.tourism.event');
    }

    public function TourismEventAdd()
    {
    	return view('adminpage.tourism.event_add');
    }

    public function TourismThings()
    {
    	return view('adminpage.tourism.things');
    }

    public function TourismThingsAdd()
    {
    	return view('adminpage.tourism.things_add');
    }

    public function TourismDestination()
    {
    	return view('adminpage.tourism.dt');
    }

    public function TourismdestinationAdd()
    {
    	return view('adminpage.tourism.dt_add');
    }

    public function TourismELB()
    {
    	return view('adminpage.tourism.elb');
    }

    public function TourismELBAdd()
    {
    	return view('adminpage.tourism.elb_add');
    }

    public function TourismBLB()
    {
    	return view('adminpage.tourism.blb');
    }

    public function TourismBLBAdd()
    {
    	return view('adminpage.tourism.blb_add');
    }

    public function UGC()
    {
        $data = UGC::first();
        return view('adminpage.tourism.UGC',['data' => $data]);
    }

    public function UGCEdit(Request $request)
    {
        $updateQuery = UGC::where('id',$request->id)->update([
            'hashtag' => $request->hashtag,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updateQuery) {
            // returns true
            return 1;
        }
        else {
            // returns false
            return 0;
        }
    }


    //Industri & Investment
    public function InvesmentSlider()
    {
    	return view('adminpage.industri-investment.slider');
    }

    public function InvesmentSliderAdd()
    {
    	return view('adminpage.industri-investment.slider_add');
    }

    public function InvestmentHeadlineNews()
    {
        $data = InvestmentHN::first();
    	return view('adminpage.industri-investment.headline_news',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function InvestmentHeadlineNewsUpdate(Request $request)
    {
        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/uploads/InvestmentHN/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/uploads/InvestmentHN/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/InvestmentHN/', $name);
            $img = $name;

            $data = InvestmentHN::where('id','=',1)
            ->update([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image' => $img,
            ]);
        
        }else{
            $data = InvestmentHN::where('id','=',1)
            ->update([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn
            ]);
    
        }

        $data = InvestmentHN::first();
    	return view('adminpage.industri-investment.headline_news',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function InvestmentHowToInvest()
    {
        $data = InvestmentHTI::first();
    	return view('adminpage.industri-investment.how_to_invest',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function InvestmentHowToInvestUpdate(Request $request)
    {
        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/uploads/InvestmentHTI/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/uploads/InvestmentHTI/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/InvestmentHTI/', $name);
            $img = $name;

            $data = InvestmentHTI::where('id','=',1)
            ->update([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image' => $img,
            ]);
        
        }else{
            $data = InvestmentHTI::where('id','=',1)
            ->update([
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn
            ]);
    
        }

        $data = InvestmentHTI::first();
    	return view('adminpage.industri-investment.how_to_invest',['data' => $data,'status'=> 0,'status_message' => '']);
    }


    public function InvesmentAchievement()
    {
    	return view('adminpage.industri-investment.achievement');
    }

    public function InvesmentAchievementAdd()
    {
    	return view('adminpage.industri-investment.achievement_add');
    }

    public function InvesmentLahan()
    {
    	return view('adminpage.industri-investment.lahan');
    }

    public function InvesmentLahanAdd()
    {
    	return view('adminpage.industri-investment.lahan_add');
    }

    public function InvesmentKawasanOtorita()
    {
    	return view('adminpage.industri-investment.kawasan_otorita');
    }

    public function InvesmentKawasanOtoritaAdd()
    {
    	return view('adminpage.industri-investment.kawasan_otorita_add');
    }

    public function InvesmentKomoditasUtama()
    {
        $data = InvestmentKomoditas::get();
        return view('adminpage.industri-investment.komoditas_utama',['data' => $data, 'status' => 0,'status_message' => '']);
    }

    public function InvestmentKomoditasAdd(){
        return view('adminpage.industri-investment.komoditas_utama_add');
    }

    public function InvestmentKomoditasEdit($id)
    {
        $data['data'] = InvestmentKomoditas::where('id','=',$id)->first();
        return view('adminpage.industri-investment.komoditas_utama_edit',$data);
    }
    
    public function InvestmentKomoditasEditDB(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentKomoditas/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentKomoditas/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentKomoditas/', $name);
                $img = $name;
                $data = InvestmentKomoditas::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                        'image' => $img,
                    ]);
            }else{
                $data = InvestmentKomoditas::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                    ]);
            }

            $data2 = InvestmentKomoditas::get();
            if ($data){
                return view('adminpage.industri-investment.komoditas_utama',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Komoditas Utama '.$request->judul_id]);
            }else{
                return view('adminpage.industri-investment.komoditas_utama',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Announcement '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentKomoditas::get(); 
            return view('adminpage.industri-investment.komoditas_utama',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Komoditas Utama : Silahkan gunakan nama Komoditas Utama lain']);
        }
    }

    public function InvestmentKomoditasStore(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentKomoditas/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentKomoditas/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentKomoditas/', $name);
                $img = $name;
            }else{
                $img = '';
            }

            $data = InvestmentKomoditas::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image'=>$img
            ]);
        
            $data2 = InvestmentKomoditas::get(); 
            if ($data2){
                

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.inv.komoditas_utama', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Komoditas Utama ']);
            }else{
                
                return redirect()->route('admin.inv.komoditas_utama',['data' => $data2,'status'=> -1,'status_message' => 'Sukses menambah Komoditas Utama ']);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentKomoditas::get(); 
            return view('adminpage.industri-investment.komoditas_utama',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Komoditas Utama : Silahkan gunakan nama Komoditas Utama lain']);
        }
    }

    public function InvestmentKomoditasDelete(Request $request)
    {
        // delete data
        $deleteQuery = InvestmentKomoditas::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function InvesmentSektorIndustri()
    {
        $data = InvestmentSektor::get();
    	return view('adminpage.industri-investment.sektor_industri',['data' => $data, 'status' => 0,'status_message' => '']);
    }

    public function InvesmentSektorIndustriAdd()
    {
    	return view('adminpage.industri-investment.sektor_industri_add');
    }

    public function InvesmentSektorIndustriEdit($id)
    {
        $data['data'] = InvestmentSektor::where('id','=',$id)->first();
        return view('adminpage.industri-investment.sektor_industri_edit',$data);
    }
    
    public function InvesmentSektorIndustriEditDB(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentSektor/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentSektor/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentSektor/', $name);
                $img = $name;
                $data = InvestmentSektor::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                        'image' => $img,
                    ]);
            }else{
                $data = InvestmentSektor::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                    ]);
            }

            $data2 = InvestmentSektor::get();
            if ($data){
                return view('adminpage.industri-investment.sektor_industri',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Sektor Industri '.$request->judul_id]);
            }else{
                return view('adminpage.industri-investment.sektor_industri',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Sektor Industri '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentSektor::get(); 
            return view('adminpage.industri-investment.sektor_industri',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Sektor Industri : Silahkan gunakan nama sektor industri lain']);
        }
    }

    public function InvesmentSektorIndustriStore(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentSektor/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentSektor/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentSektor/', $name);
                $img = $name;
            }else{
                $img = '';
            }

            $data = InvestmentSektor::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image'=>$img
            ]);
        
            $data2 = InvestmentSektor::get(); 
            if ($data2){
                

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.inv.sektor_industri', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Sektor Industri ']);
            }else{
                
                return redirect()->route('admin.inv.sektor_industri',['data' => $data2,'status'=> -1,'status_message' => 'Sukses menambah Sektor Industri ']);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentSektor::get(); 
            return view('adminpage.industri-investment.sektor_industri',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Sektor Industri : Silahkan gunakan nama Sektor Industri lain']);
        }
    }

    public function InvesmentSektorIndustriDelete(Request $request)
    {
        // delete data
        $deleteQuery = InvestmentSektor::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function InvesmentBenefitResiko()
    {
        $data = InvestmentBenefitResiko::get();
    	return view('adminpage.industri-investment.benefit_resiko',['data' => $data, 'status' => 0,'status_message' => '']);
    }

    public function InvesmentBenefitResikoAdd()
    {
    	return view('adminpage.industri-investment.benefit_resiko_add');
    }

    public function InvesmentBenefitResikoEdit($id)
    {
        $data['data'] = InvestmentBenefitResiko::where('id','=',$id)->first();
        return view('adminpage.industri-investment.benefit_resiko_edit',$data);
    }
    
    public function InvesmentBenefitResikoEditDB(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentBenefit/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentBenefit/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentBenefit/', $name);
                $img = $name;
                $data = InvestmentBenefitResiko::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                        'image' => $img,
                    ]);
            }else{
                $data = InvestmentBenefitResiko::where('id','=',$request->id)
                    ->update([
                        'judul_id' => $request->judul_id,
                        'judul_en' => $request->judul_en,
                        'judul_cn' => $request->judul_cn,
                        'deskripsi_id' => $request->deskripsi_id,
                        'deskripsi_en' => $request->deskripsi_en,
                        'deskripsi_cn' => $request->deskripsi_cn,
                    ]);
            }

            $data2 = InvestmentBenefitResiko::get();
            if ($data){
                return view('adminpage.industri-investment.benefit_resiko',['data' => $data2,'status'=> 1,'status_message' => 'Sukses mengedit Benefit Resiko '.$request->judul_id]);
            }else{
                return view('adminpage.industri-investment.benefit_resiko',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Benefit Resiko '.$request->judul_id]);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentBenefitResiko::get(); 
            return view('adminpage.industri-investment.benefit_resiko',['data' => $data2,'status'=> -1,'status_message' => 'Gagal mengedit Benefit Resiko : Silahkan gunakan nama Benefit Resiko lain']);
        }
    }

    public function InvesmentBenefitResikoStore(Request $request)
    {
        try {
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/InvestmentBenefit/')){
                    Storage::makeDirectory(public_path().'/uploads/InvestmentBenefit/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/InvestmentBenefit/', $name);
                $img = $name;
            }else{
                $img = '';
            }

            $data = InvestmentBenefitResiko::create([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image'=>$img
            ]);
        
            $data2 = InvestmentBenefitResiko::get(); 
            if ($data2){
                

                // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
                return redirect()->route('admin.inv.benefit_resiko', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Benefit Resiko ']);
            }else{
                
                return redirect()->route('admin.inv.benefit_resiko',['data' => $data2,'status'=> -1,'status_message' => 'Sukses menambah Benefit Resiko ']);
            }
        } catch (\Exception $e) {
            $data2 = InvestmentBenefitResiko::get(); 
            return view('adminpage.industri-investment.benefit_resiko',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Benefit Resiko : Silahkan gunakan nama Benefit Resiko lain']);
        }
    }

    public function InvesmentBenefitResikoDelete(Request $request)
    {
        // delete data
        $deleteQuery = InvestmentBenefitResiko::where('id',$request->id)->delete();
        if ($deleteQuery) {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function InvesmentInfografisKawasanOtorita()
    {
    	return view('adminpage.industri-investment.infografis_kawasan_otorita');
    }

    public function InvesmentInfografisKawasanOtoritaAdd()
    {
    	return view('adminpage.industri-investment.infografis_kawasan_otorita_add');
    }

    public function InvesmentInfografisKawasanFlores()
    {
    	return view('adminpage.industri-investment.infografis_kawasan_flores');
    }

    public function InvesmentInfografisKawasanFloresAdd()
    {
    	return view('adminpage.industri-investment.infografis_kawasan_flores');
    }

    public function InvesmentBusinessInsiders()
    {
    	return view('adminpage.industri-investment.business_insiders');
    }

    public function InvesmentBusinessInsidersAdd()
    {
    	return view('adminpage.industri-investment.business_insiders_add');
    }

    public function InvesmentKontakInvest()
    {
    	return view('adminpage.industri-investment.kontak_invest');
    }
    
    public function InvesmentKontakRequest()
    {
    	return view('adminpage.industri-investment.kontak_request');
    }


    //LBFTA
    public function LbftaSlider()
    {
    	return view('adminpage.lbfta.slider');
    }

    public function LbftaSliderAdd()
    {
    	return view('adminpage.lbfta.slider_add');
    }

    public function LbftaHeadlineNews()
    {
        $data = ProfileHN::first();
    	return view('adminpage.lbfta.headline_news',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaHeadlineNewsUpdate(Request $request)
    {
        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/uploads/ProfileHN/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/uploads/ProfileHN/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/ProfileHN/', $name);
            $img = $name;

            $data = ProfileHN::where('id','=',1)
            ->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn,
                'image' => $img,
            ]);
        
        }else{
            $data = ProfileHN::where('id','=',1)
            ->update([
                'judul_id' => $request->judul_id,
                'judul_en' => $request->judul_en,
                'judul_cn' => $request->judul_cn,
                'deskripsi_id' => $request->deskripsi_id,
                'deskripsi_en' => $request->deskripsi_en,
                'deskripsi_cn' => $request->deskripsi_cn
            ]);
    
        }

        $data = ProfileHN::first();
    	return view('adminpage.lbfta.headline_news',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaAchievement()
    {
    	return view('adminpage.lbfta.achievement');
    }

    public function LbftaAchievementAdd()
    {
    	return view('adminpage.lbfta.achievement_add');
    }

    public function LbftaAbout()
    {
        $data = ProfileAbout::first();
    	return view('adminpage.lbfta.about',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaAboutUpdate(Request $request)
    {
    	$data = ProfileAbout::where('id','=',1)
        ->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'video_url' => $request->video_url,
        ]);

        $data = ProfileAbout::first();
    	return view('adminpage.lbfta.about',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaMissionVision()
    {
        $data = ProfileMission::first();
    	return view('adminpage.lbfta.mission_vision',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaMissionVisionUpdate(Request $request)
    {
    	$data = ProfileMission::where('id','=',1)
        ->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'vision_id' => $request->vision_id,
            'vision_en' => $request->vision_en,
            'vision_cn' => $request->vision_cn,
            'mission_id' => $request->mission_id,
            'mission_en' => $request->mission_en,
            'mission_cn' => $request->mission_cn,
            'video_url' => $request->video_url,
        ]);

        $data = ProfileMission::first();
    	return view('adminpage.lbfta.mission_vision',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaOrg()
    {
        $data = ProfileOrganization::first();
    	return view('adminpage.lbfta.org',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaOrgUpdate(Request $request)
    {
        
        $data = ProfileOrganization::where('id','=',1)
        ->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'video_url' => $request->video_url,
        ]);

        if ($request->hasfile('img')){
            if(!Storage::exists(public_path().'/uploads/ProfileOrg/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/uploads/ProfileOrg/'.$request->id.'/');
            }
            $file = $request->file('img');
            $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/ProfileOrg/', $name);
            $img = $name;

            $data = ProfileOrganization::where('id','=',1)
            ->update([
                'image' => $img,
            ]);
        
        }

        if ($request->hasfile('img2')){
            if(!Storage::exists(public_path().'/uploads/ProfileOrg/'.$request->id.'/')){
                Storage::makeDirectory(public_path().'/uploads/ProfileOrg/'.$request->id.'/');
            }
            $file = $request->file('img2');
            $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/ProfileOrg/', $name);
            $img = $name;

            $data = ProfileOrganization::where('id','=',1)
            ->update([
                'image_2' => $img,
            ]);
        
        }

        $data = ProfileOrganization::first();
    	return view('adminpage.lbfta.org',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaDuties()
    {
        $data = ProfileRespective::first();
    	return view('adminpage.lbfta.duties',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaDutiesUpdate(Request $request)
    {
        $data = ProfileRespective::where('id','=',1)
        ->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'video_url' => $request->video_url,
        ]);

        $data = ProfileRespective::first();
    	return view('adminpage.lbfta.duties',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaNewsRelease()
    {
    	return view('adminpage.lbfta.news_release');
    }

    public function LbftaNewsReleaseAdd()
    {
    	return view('adminpage.lbfta.news_release_add');
    }

    public function LbftaReport()
    {
    	return view('adminpage.lbfta.report');
    }

    public function LbftaReportAdd()
    {
    	return view('adminpage.lbfta.report_add');
    }

    public function LbftaJobVacancy()
    {
    	return view('adminpage.lbfta.job_vacancy');
    }

    public function LbftaJobVacancyAdd()
    {
    	return view('adminpage.lbfta.job_vacancy_add');
    }

    public function LbftaPartner()
    {
    	return view('adminpage.lbfta.partner');
    }

    public function LbftaPartnerAdd()
    {
    	return view('adminpage.lbfta.partner_add');
    }

    public function LbftaResearch()
    {
    	return view('adminpage.lbfta.research');
    }

    public function LbftaResearchAdd()
    {
    	return view('adminpage.lbfta.research_add');
    }

    public function LbftaKontakInquiry()
    {
    	return view('adminpage.lbfta.kontak_inquiry');
    }

    public function LbftaKontakInquiryAdd()
    {
    	return view('adminpage.lbfta.kontak_inquiry_add');
    }

    public function LbftaKontakForm()
    {
    	return view('adminpage.lbfta.kontak_form');
    }

    public function LbftaKontakFormAdd()
    {
    	return view('adminpage.lbfta.kontak_form_add');
    }

    public function EditProfileIndex()
    {
        // update data
        $user_id = Auth::user()->id;
        $resultQuery = DB::table('users')->where('id',$user_id)->first();

    	return view('adminpage.edit_profile.index',['resultQuery' => $resultQuery,'status'=> 0,'status_message' => null]);
    }

    public function EditProfileStore(Request $request)
    {
        // update data
        $user_id = Auth::user()->id;
        if ($request->password==null || $request->password==""){
            $updateQuery = DB::table('users')->where('id',$user_id)->update([
                'name' => $request->name,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } else{
            $updateQuery = DB::table('users')->where('id',$user_id)->update([
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        $resultQuery = DB::table('users')->where('id',$user_id)->first();
        if ($updateQuery) {
            // returns true
    	    return view('adminpage.edit_profile.index',['resultQuery' => $resultQuery,'status'=> 1,'status_message' => "Berhasil Edit Data"]);
        }
        else {
            // returns false
    	    return view('adminpage.edit_profile.index',['resultQuery' => $resultQuery,'status'=> -1,'status_message' => "Gagal Edit Data"]);
        }
    }

    public function Footer()
    {
        $data = Footer::first();
    	return view('adminpage.layout.footer',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function FooterUpdate(Request $request)
    {
        try{
            $data = Footer::where('id','=',1)
            ->update([
                'privacy_link' => $request->privacy_link,
                'youtube_link' => $request->youtube_link,
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'twitter_link' => $request->twitter_link,
                'alamat' => $request->alamat
            ]);
    
            if ($request->hasfile('img')){
                if(!Storage::exists(public_path().'/uploads/LayoutFooter/'.$request->id.'/')){
                    Storage::makeDirectory(public_path().'/uploads/LayoutFooter/'.$request->id.'/');
                }
                $file = $request->file('img');
                $name = Carbon::now()->format('YmdHis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/LayoutFooter/', $name);
                $img = $name;
    
                $data = Footer::where('id','=',1)
                ->update([
                    'background_image' => $img,
                ]);
            
            }
    
            $data = Footer::first();
            return view('adminpage.layout.footer',['data' => $data,'status'=> 0,'status_message' => '']);
        }catch (\Exception $e) {
            $data2 = Footer::first(); 
            return view('adminpage.layout.footer',['data' => $data2,'status'=> -1,'status_message' => $e]);
        }
        
    }

}
