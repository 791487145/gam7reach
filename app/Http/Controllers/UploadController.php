<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaiscController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UploadController extends BascController
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

    /**
     * 企业logo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function companyAvater(Request $request)
    {
        if($request->file('file')){
            $pic = Storage::putFile('company',$request->file('file'));
            return response()->json(['pic'=>$pic]);
        }
    }

    /**
     * 门店logo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogo(Request $request)
    {
        if($request->file('file')){
            $pic = Storage::putFile('store',$request->file('file'));
            return response()->json(['pic'=>$pic]);
        }
    }
}
