<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\InvestmentBerinvestasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class InvestmentBerinvestasiController extends Controller
{

    public function index()
    {
        // $lang = "id";
        $data = InvestmentBerinvestasi::orderBy('updated_at', 'desc')->get();
        return view('adminpage.industri-investment.kontak_invest',['resultQuery' => $data,'status'=> 0,'status_message' => '']);
    }

    public function delete(Request $request)
    {
        error_log($request->id);
        $data = InvestmentBerinvestasi::where('id', $request->id)->delete();
        
        $data2 = InvestmentBerinvestasi::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
