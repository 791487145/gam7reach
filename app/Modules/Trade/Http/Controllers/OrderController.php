<?php

namespace App\Modules\Trade\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\MainCategory;
use App\Model\Order;
use Illuminate\Http\Request;
use Cache;

class OrderController extends BaiscController
{

    /**
     * 所有订单
     * @param Request $request
     * @return mixed
     */
    public function orderList(Request $request)
    {
        $orders = new Order();
        $param = $request->only('store_id','order_sn','start_time','order_state','shipping_type','payment_code','order_type','page','limit','end_time');
        $orders = Order::order($orders,$param,$this->company_id);
        dd($orders);
        $data = array(
            //'company' => $company
        );
        return $this->success($data);
    }



}
