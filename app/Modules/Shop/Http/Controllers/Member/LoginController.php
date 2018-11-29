<?php
/**
 * Created by PhpStorm.
 * User: 冯鑫
 * Date: 2018/11/28
 * Email:fengxin5571@gmail.com
 * Time: 16:46
 */
namespace  App\Modules\Shop\Http\Controllers\Member;
use App\Http\Controllers\BascController;
use App\Services\SmsService;
use Illuminate\Http\Request;

class LoginController extends BascController{
    /*
     * 发送短信验证码
     */
    public function sendSms(Request $request,SmsService $smsService){
        $data=$smsService->sendSms('18636984056');
        if($data){
            return $this->success($data);
        }
        return $this->failed('发送失败');
    }
    /*
     * 登录注册
     */

}