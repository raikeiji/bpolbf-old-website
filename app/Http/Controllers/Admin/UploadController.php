<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;

class UploadController extends Controller
{

    public function upload(Request $request)
    {
        //Move Uploaded File
        $destinationPath = 'uploads/ckeditor';

        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $path = $file->move($destinationPath, $name);

        $fileNameToStore= url($destinationPath.'/'.$name);
        return json_encode(['location' => $fileNameToStore]); 
    }
    
}
