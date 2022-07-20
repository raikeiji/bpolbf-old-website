<?php

namespace App\Http\Controllers\Investasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Investasi;
use App\Slider;

use App\InvestmentBerinvestasi;
use App\InvestmentPendanaan;
use App\InvestmentHN;
use App\InvestmentHTI;
use App\InvestmentBI;
use App\InvestmentKomoditas;
use App\InvestmentSektor;
use App\InvestmentBenefitResiko;
use App\Footer;

use DB;

class InvestasiController extends Controller
{
    public function index()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }

        $slider = DB::table('tm_slider')
            ->select('file_img', 'slug', 'judul_'.$lang.' as judul', 'deskripsi_'.$lang.' as deskripsi')
            ->where('page_id', 2)
            ->where('active', 1)
            ->get();

        $hn = InvestmentHN::select('image', 'deskripsi_'.$lang.' as deskripsi')->first();
        $how_to_invest = InvestmentHTI::select('image', 'deskripsi_'.$lang.' as deskripsi')->first();
        $business = InvestmentBI::select('id','image', 'slug', 'nama', 'deskripsi_'.$lang.' as deskripsi')->orderBy('updated_at', 'desc')->get();
        $komoditas = InvestmentKomoditas::select('image', 'deskripsi_'.$lang.' as deskripsi','judul_'.$lang.' as judul')->get();
        $sektor = InvestmentSektor::select('image', 'deskripsi_'.$lang.' as deskripsi','judul_'.$lang.' as judul')->get();
        $benefit = InvestmentBenefitResiko::select('image', 'deskripsi_'.$lang.' as deskripsi','judul_'.$lang.' as judul')->get();

        $data['sliders'] = $slider;
        $data['hn'] = $hn;
        $data['how_to_invest'] = $how_to_invest;
        $data['business'] = $business;
        $data['komoditas'] = $komoditas;
        $data['sektor'] = $sektor;
        $data['benefit'] = $benefit;
        $data['footer'] = Footer::first();

        return view('investasi/pages/index', $data);
    }

    public function berinvestasi()
    {
        $data['footer'] = Footer::first();
        return view('investasi/pages/berinvestasi',$data);
    }
    
    public function berinvestasi_submit(Request $request)
    {
        $data = InvestmentBerinvestasi::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if ($data){
            return 1;
        }else{
            return 0;
        }
    }

    public function pendanaan()
    {
        $data['footer'] = Footer::first();
        return view('investasi/pages/pendanaan',$data);
    }

    public function pendanaan_submit(Request $request)
    {
        $data = InvestmentPendanaan::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if ($data){
            return 1;
        }else{
            return 0;
        }
    }

    public function opportunity()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $news = InvestmentHN::select('id','image', 'deskripsi_'.$lang.' as deskripsi')->first();

        $data['data'] = $news;
        $data['footer'] = Footer::first();
        return view('investasi/pages/opportunityView', $data);
    }

    public function how_to_invest()
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $news = InvestmentHTI::select('id','image', 'deskripsi_'.$lang.' as deskripsi')->first();

        $data['data'] = $news;
        $data['footer'] = Footer::first();
        return view('investasi/pages/howToInvestView', $data);
    }

    public function business_insiders($slug)
    {
        $lang = session()->get('locale');
        if (!$lang){
            $lang = "id";
        }
        $news = InvestmentBI::select('id','nama','image', 'deskripsi_'.$lang.' as deskripsi')->where("slug",$slug)->first();

        $data['data'] = $news;
        $data['footer'] = Footer::first();
        return view('investasi/pages/businessView', $data);
    }
}
