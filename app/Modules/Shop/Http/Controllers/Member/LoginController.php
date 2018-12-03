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
use App\Model\Member;
use App\Model\MemberGrade;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class LoginController extends BascController{
    protected $company_id;

    public function __construct()
    {
        //parent::__construct();
        $this->middleware(function($request,$next){

            if($request->input('company_id')){
                $this->company_id=$request->input('company_id');
                return $next($request);
            }
            return $this->failed('企业id不能为空');
        });
    }

    /*
     * 发送短信验证码
     */
    public function sendSms(Request $request,SmsService $smsService){
        $message=array(
            'mobile.required'=>'手机号不能为空',
            'moblie.is_mobile'=>'手机格式不正确',
        );
        $validator=Validator::make($request->all(),[
            'mobile'=>'required|is_mobile',
        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }
        $data=$smsService->sendSms($request->input('mobile'),$this->company_id);
        if($data){
            return $this->success($data);
        }
        return $this->failed('发送失败');
    }
    /*
     * 登录注册
     */
    public function login(Request $request,Member $memberModel){
        $source_channel=$request->input('source_channel',1);//来源渠道
        $message=array(
            'key.required'=>'加密口令不能为空',
            'mobile.required'=>'手机号不能为空',
            'mobile.is_mobile'=>'手机格式不正确',
            'cachcode.required'=>'手机验证码不能为空',

        );
        $validator=Validator::make($request->all(),[
            'key'=>'required',
            'mobile'=>'required|is_mobile',
            'cachcode'=>'required',

        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }
        $cachData=Cache::get($request->input('key'));
        if(empty($cachData)){
            return $this->failed('短信已过期，请重新发送');
        }
        if(!hash_equals((string)$cachData['phone'],$request->input('mobile'))||!hash_equals((string)$cachData['code'],$request->input('cachcode'))){
            return $this->failed('验证码不正确');
        }
        $member=Member::where(['company_id'=>$this->company_id,
            'member_mobile'=>$request->input('mobile')])->first();
        if($member){//如果会员已存在则登录
            if($token=auth('member')->login($member)){
                $member->update([
                    'member_login_time'=>time(),
                    'member_old_login_time'=>$member->member_login_time,
                    'member_login_ip'=>$request->getClientIp(),
                    'member_old_login_ip'=>$member->member_login_ip,
                ]);
                return $this->success($token);
            }
        }
        $member_grade=MemberGrade::where(['company_id'=>$this->company_id,'grade_level'=>'VIP1'])->first();
        $insert_array=array(
            'member_mobile'=>$request->input('mobile'),
            'member_grade_id'=>$member_grade->grade_id,
            'source_channel'=>$source_channel,
            'member_time'=>time(),
            'member_login_time'=>time(),
            'member_login_ip'=>$request->getClientIp(),
            'company_id'=>$this->company_id,
        );
        if($new_member=Member::create($insert_array)){
            $token=auth('member')->login($new_member);
            return $this->success($token);
        }
        return $this->failed('登录失败');
    }
}