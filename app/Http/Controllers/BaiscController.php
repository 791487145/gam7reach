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
    public $company_id;
    public $admin = 1;
    public $region = 2;
    public $shoper = 3;
    public $guide = 4;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $name = Route::currentRouteName();

            $employ = auth('employ')->user();
            $this->company_id = $employ->company_id;
            return $next($request);
        });
    }


}
