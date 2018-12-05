<?php

namespace App\Modules\Company\Http\Controllers;

use App\Exports\StoreExport;
use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\CompanyExtend;
use App\Model\CoPayment;
use App\Model\Employ;
use App\Model\Role;
use Cache;
use App\Model\RegisionManager;
use App\Model\Store;
use Illuminate\Http\Request;
use UUID;

class SettingController extends BaiscController
{
    /**
     * 设置
     * @param Request $request
     * @return mixed
     */
    public function paySetting(Request $request)
    {
        $config = CompanyExtend::whereCompanyId($this->company_id)->first();

        $co_payments = CoPayment::whereCompanyId($this->company_id)->get();
        foreach ($co_payments as $co_payment){
            $co_payment->pay_set = unserialize($co_payment->payment_config);
            $co_payment->payment_name = $co_payment->payment->payment_name;
        }

        $data = array(
            'co_payments' => $co_payments,
            'config' => $config
        );
        return $this->success($data);
    }

    /**
     * 支付设置
     * @param Request $request
     * @return mixed
     */
    public function paySettingUpdate(Request $request)
    {
        $wechat = array(
            'appId' => $request->post('appId'),
            'mch_id' => $request->post('wechat_secret'),
            'we_key' => $request->post('key'),
            'payment_state' => $request->post('we_payment_state'),
        );
        $alipay = array(
            'app_id' => $request->post('app_id'),
            'parent_id' => $request->post('parent_id'),
            'ali_key' => $request->post('ali_key'),
            'payment_state' => $request->post('ali_payment_state')
        );
        CoPayment::whereCompanyId($this->company_id)->whereId($request->post('we_payment_id'))->update($wechat);
        CoPayment::whereCompanyId($this->company_id)->whereId($request->post('ali_payment_id'))->update($alipay);
        return $this->message('修改成功');
    }

    /**
     * 公众号设置
     * @param Request $request
     * @return mixed
     */
    public function wechatSetting(Request $request)
    {
        $param = array(
            'appid' => $request->post('appid'),
            'secret' => $request->post('secret')
        );
        CompanyExtend::whereCompanyId($this->company_id)->update($param);
        return $this->message('修改成功');
    }




}
