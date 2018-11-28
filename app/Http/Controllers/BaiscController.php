<?php

namespace App\Http\Controllers;

use App\Model\Role;
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
    public $admin = Role::PREINSTALL_ROLE_ADMIN;//超级管理员
    public $region = Role::PREINSTALL_ROLE_REGION;//区经
    public $shoper = Role::PREINSTALL_ROLE_SHOPER;//店长
    public $guide = Role::PREINSTALL_ROLE_GUIDE;//导购
    public $store_id;//门店id字符串
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $name = Route::currentRouteName();
            /*$a = auth('employ')->check();
            dd($a);*/
            $employ = auth('employ')->user();

            if(empty($employ)){
                return $this->failed('token过期或不正确');
            }

            $this->company_id = $employ->company_id;
            $this->store_id = $employ->store_id;
            return $next($request);
        });
    }


}
