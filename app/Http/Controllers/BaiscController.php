<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Apiresponse\ApiResponses;
use Route;

class BaiscController extends BascController
{

    const LIMIT=10;//每页条数
    public $company_id;//企业id
    public $admin = 1;//超级管理员
    public $region = 2;//区经
    public $shoper = 3;//店长
    public $guide = 4;//导购
    public $store_id;//门店id
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $name = Route::currentRouteName();

            $employ = auth('employ')->user();
            if(empty($employ)){
                return $this->failed('token过期或不正确');
            }
            //dd($employ);
            $this->company_id = $employ->company_id;
            $this->store_id = $employ->shop_id;
            return $next($request);
        });
    }


}
