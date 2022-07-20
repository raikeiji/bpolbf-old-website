<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\InvestmentPendanaan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class InvestmentPendanaanController extends Controller
{

    public function index()
    {
        // $lang = "id";
        $data = InvestmentPendanaan::orderBy('updated_at', 'desc')->get();
        return view('adminpage.industri-investment.kontak_request',['resultQuery' => $data,'status'=> 0,'status_message' => '']);
    }

    public function delete(Request $request)
    {
        $data = InvestmentPendanaan::where('id', $request->id)->delete();
        
        $data2 = InvestmentPendanaan::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
