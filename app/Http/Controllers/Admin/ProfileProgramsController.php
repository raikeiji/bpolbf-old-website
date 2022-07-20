<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\WebPage;
use App\Slider;
use App\ProfileProgram;
use App\ProfileProgramSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Util\Json;
use Illuminate\Support\Carbon;
use File;

class ProfileProgramsController extends Controller
{

    public function LbftaProgram()
    {
        // $lang = "id";
        $data = ProfileProgram::orderBy('tanggal', 'desc')->get();
        return view('adminpage.lbfta.program',['data' => $data,'status'=> 0,'status_message' => '']);
    }

    public function LbftaProgramAdd()
    {
    	return view('adminpage.lbfta.program_add');
    }

    public function LbftaProgramStore(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        // dd($request->all());
        $data = ProfileProgram::create([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'icon' => $request->icon,
            'tanggal' => $date,
            'slug' => $slug
        ]);

        //create per program
        if($request->repeater)
        {
            foreach ($request['repeater'] as $key => $v){
                $create_section = ProfileProgramSection::create([
                    'judul' => $request['repeater.'.$key.'.judul_program'],
                    'deskripsi' => $request['repeater.'.$key.'.deskripsi_program'],
                ]);
            }
        }
        
        $data2 = ProfileProgram::get(); 
        if ($data){

            // return view('adminpage.tourism.pengumuman',['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Announcement ']);
            return redirect()->route('admin.lbfta.program', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses menambah Program ']);
        }else{
            
            return redirect()->route('admin.lbfta.program',['data' => $data2,'status'=> -1,'status_message' => 'Gagal menambah Program ']);
        }
    }

    public function LbftaProgramEdit($id)
    {
        // $lang = "id";
        $data = ProfileProgram::where('id','=',$id)
        ->first();
        $sub_program = ProfileProgramSection::where('id_program',$id)->get();
        return view('adminpage.lbfta.program_edit',['data' => $data,'sub_program' => $sub_program,'status'=> 0,'status_message' => '']);
    }

    public function LbftaProgramUpdate(Request $request)
    {
        // $date = Carbon::parse($request->tanggal);
        $date = Carbon::createFromFormat("m-d-Y", $request->tanggal);
        $slug = str_slug($request->judul_id,'-');
        // dd($request->all());
        $data = ProfileProgram::where('id', $request->id)->update([
            'judul_id' => $request->judul_id,
            'judul_en' => $request->judul_en,
            'judul_cn' => $request->judul_cn,
            'deskripsi_id' => $request->deskripsi_id,
            'deskripsi_en' => $request->deskripsi_en,
            'deskripsi_cn' => $request->deskripsi_cn,
            'icon' => $request->icon,
            'tanggal' => $date,
            'slug' => $slug
        ]);
        
        
        $updateQuery = ProfileProgramSection::where('id_program',$request->id)->delete();

        //create per program
        if($request->judul_program)
        {
            $i=0;
            foreach ($request['judul_program'] as $key => $v){
                $create_section = ProfileProgramSection::create([
                    'id_program' => $request->id,
                    'judul' => $request['judul_program'][$i],
                    'deskripsi' => $request['deskripsi_program'][$i],
                ]);
                $i++;
            }
        }
        //create per program
        if($request->repeater)
        {
            foreach ($request['repeater'] as $key => $v){
                $create_section = ProfileProgramSection::create([
                    'id_program' => $request->id,
                    'judul' => $request->repeater[$key]['judul_program'],
                    'deskripsi' => $request->repeater[$key]['deskripsi_program'],
                ]);
            }
        }
        
        $data2 = ProfileProgram::get(); 
        if ($data){
            return redirect()->route('admin.lbfta.program', ['data' => $data2,'status'=> 1,'status_message' => 'Sukses edit Program ']);
        }else{
            
            return redirect()->route('admin.lbfta.program',['data' => $data2,'status'=> -1,'status_message' => 'Gagal edit Program ']);
        }
    }

    public function LbftaProgramDelete(Request $request)
    {
        $data = ProfileProgram::where('id', $request->id)->delete();
        $deleteQuery = ProfileProgramSection::where('id_program',$request->id)->delete();

        $data2 = ProfileProgram::get(); 
        if ($data){
            return 1;
        }else{
            
            return 0;
        }
    }
    
}
