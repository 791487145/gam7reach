<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Apiresponse\ApiResponses;
use App\Http\Controllers\Common\Common;

class BascController extends Controller
{
    use ApiResponses,Common;

}
