<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BascController;
use App\Model\Employ;
use App\Model\Menus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LoginController extends BascController
{
    /**
     * 登录
     * @param Request $request
     * @return mixed
     */
    public function companyLogin(Request $request)
    {
        $credentials = array(
            'mobile' => $request->post('mobile'),
            'password' => $request->post('password')
        );

        if($token = auth('employ')->attempt($credentials)){
            return $this->success($token);
        };

        return $this->failed('登录失败');
    }

}
