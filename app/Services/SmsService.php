<?php

namespace App\Services;

use App\Model\CompanyExtend;
use Overtrue\EasySms\EasySms;

class SmsService
{
    /*
     * 发送短信,返回缓存键值和持续时间
     * @param $phone //手机号
     * @param $company_id //企业id
     * $send_type 发送场景 1登陆
     */
    public function sendSms($phone = '',$company_id=0,$send_type=1)
    {
        if (!$phone)return [];
        $config = config('easysms');
        $sms_config  =  $config['sms_config'];
        $sign_name='企及云';
        if($send_type!=1){//如果不是登录
            //查询企业扩展信息获取短信签名
            $company_extend=CompanyExtend::where('company_id',$company_id)->first();
            if(!$company_extend)return false;
            $sign_name=$company_extend->sign_name;
        }

        $config = [
            'timeout' => 5.0,
            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
                // 默认可用的发送网关
                'gateways' => [
                    'aliyun',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => '',
                    'access_key_secret' => '',
                    'sign_name' =>$sign_name,
                ],
            ],
        ];
        $code = $this->makeRandCode();
        $message=[
            'template' => $sms_config['template_id'][$send_type],
            'data' => [
                'code' => $code,
            ],
        ];
        if (env('APP_DEBUG')&&1==2) {//开发环境不真发送
            $code = 1234;
        } else {

            try{
                $easySms = new EasySms($config);
                //发送短信
                $easySms->send($phone, $message);
            }catch (\Exception $e) {

                dd($e->getLastException());
                return [];
            }
        }
        //将验证码存到缓存中
        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now('PRC')->addMinutes($sms_config['expire']);
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);
        return ['key'=>$key, 'expire'=>$expiredAt];
    }

    //随机生成短信验证码
    public function makeRandCode()
    {
        // 生成4位随机数，左侧补0
        return random_int(1000,9999);
    }
}