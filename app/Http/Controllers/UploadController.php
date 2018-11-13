<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaiscController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadController extends BaiscController
{
    public function picUpload(Request $request)
    {
        if($request->file('file')){
            $pic = Storage::putFile('picture',$request->file('file'));
            return response()->json(['pic'=>$pic]);
        }
    }

    public function fileDelete(Request $request)
    {
        $file = $request->post('file');
        $ret = Storage::delete($file);
    }

    public function download(Request $request)
    {
        $file_path = $request->get('file_path');
        return Storage::download($file_path,'demo.xls');
    }
}
