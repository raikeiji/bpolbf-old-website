<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileContact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileContactController extends Controller
{

    public function LbftaContact()
    {
        // $lang = "id";
        $data = ProfileContact::orderBy('updated_at', 'desc')->get();
        return view('adminpage.lbfta.kontak_form',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaContactDelete(Request $request)
    {
        $data = ProfileContact::where('id', $request->id)->delete();
        
        $data2 = ProfileContact::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }

}
