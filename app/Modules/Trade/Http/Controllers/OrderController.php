<?php

namespace App\Modules\Trade\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\MainCategory;
use App\Model\Order;
use App\Model\OrderLog;
use Illuminate\Http\Request;
use Cache;

class OrderController extends BaiscController
{

    /**
     * 所有订单
     * @param Request $request
     * @return mixed
     */
    public function orderList(Request $request,Order $orders)
    {
        $param = $request->only('store_id','order_sn','start_time','order_state','shipping_type','payment_code','order_type','page','limit','end_time');
        $orders = Order::order($orders,$param,$this->company_id);

        $data = array(
            'orders' => $orders,
            'count' => count($orders)
        );
        return $this->success($data);
    }

    public function orderShow(Request $request)
    {
        $order = Order::whereOrderId($request->post('order_id'))->withTrashed()->first();

        if($order->order_flag == Order::ORDER_FLAG_SHOP){
            $goods = $order->shop_goods()->select('goods_name','goods_num','goods_price','goods_pay_price')->get();
        }else{
            $goods = $order->shop_goods()->select('goods_name','goods_num','goods_price','goods_pay_price')->get();
        }

        foreach ($goods as $good){
            $good->discounts = bcsub($good->goods_price,$good->goods_pay_price,2);
        }

        $order = Order::orderCN($order);
        $order_log = OrderLog::whereOrderId($order->order_id)->orderBy('log_id','asc')->select('log_orderstate','log_time')->get();
    }



}
