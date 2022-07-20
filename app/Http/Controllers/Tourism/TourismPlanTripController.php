<?php

namespace App\Http\Controllers\Tourism;

use App\Http\Controllers\Controller;
use App\TourismPlanTrip;
use Illuminate\Http\Request;

class TourismPlanTripController extends Controller
{
    public function index(){
        $plan = TourismPlanTrip::select('*')->first();
        return view('adminpage.tourism.plan_trip',['data' => $plan,'status'=> 0,'status_message' => '']);
    }
    public function postPlan(Request $request){
        //dd($request->all());
        $plan = TourismPlanTrip::select('*')->first();
        if($plan){
            $plan->panduan_desc = $request->panduan_desc;
            $plan->panduan_desc_en = $request->panduan_desc_en;
            $plan->panduan_desc_cn = $request->panduan_desc_cn;
            $plan->panduan_link = $request->panduan_desc_link;
            $plan->visa_desc = $request->visa_desc;
            $plan->visa_desc_en = $request->visa_desc_en;
            $plan->visa_desc_cn = $request->visa_desc_cn;
            $plan->recomendation_desc = $request->recomendation_desc;
            $plan->recomendation_desc_en = $request->recomendation_desc_en;
            $plan->recomendation_desc_cn = $request->recomendation_desc_cn;
            $plan->registration_desc = $request->registration_desc;
            $plan->registration_desc_en = $request->registration_desc_en;
            $plan->registration_desc_cn = $request->registration_desc_cn;
            $plan->registration_link = $request->registration_desc_link;
            $plan->status = 1;
            if($plan->save()){
                $plan2 = TourismPlanTrip::select('*')->first();
                return view('adminpage.tourism.plan_trip',['data' => $plan2,'status'=> 1,'status_message' => "Berhasil Mengubah Data"]);
            }else{
                $plan2 = TourismPlanTrip::select('*')->first();
                return view('adminpage.tourism.plan_trip',['data' => $plan2,'status'=> -1,'status_message' => "Gagal Mengubah Data"]);
            }
        }else{
            $plan = new TourismPlanTrip();
            $plan->panduan_desc = $request->panduan_desc;
            $plan->panduan_desc_en = $request->panduan_desc_en;
            $plan->panduan_desc_cn = $request->panduan_desc_cn;
            $plan->panduan_link = $request->panduan_desc_link;
            $plan->visa_desc = $request->visa_desc;
            $plan->visa_desc_en = $request->visa_desc_en;
            $plan->visa_desc_cn = $request->visa_desc_cn;
            $plan->recomendation_desc = $request->recomendation_desc;
            $plan->recomendation_desc_en = $request->recomendation_desc_en;
            $plan->recomendation_desc_cn = $request->recomendation_desc_cn;
            $plan->registration_desc = $request->registration_desc;
            $plan->registration_desc_en = $request->registration_desc_en;
            $plan->registration_desc_cn = $request->registration_desc_cn;
            $plan->registration_link = $request->registration_desc_link;
            $plan->status = 1;
            if($plan->save()){
                $plan2 = TourismPlanTrip::select('*')->first();
                return view('adminpage.tourism.plan_trip',['data' => $plan2,'status'=> 1,'status_message' => "Berhasil Menambah Data"]);
            }else{
                $plan2 = TourismPlanTrip::select('*')->first();
                return view('adminpage.tourism.plan_trip',['data' => $plan2,'status'=> -1,'status_message' => "Gagal Menambah Data"]);
            }
        }
    }
}
