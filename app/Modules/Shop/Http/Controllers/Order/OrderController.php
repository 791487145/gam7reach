<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:33 AM
 */
namespace  App\Modules\Shop\Http\Controllers\Order;
use App\Http\Controllers\ShopBascController;
use App\Model\ShopCart;
use App\Model\WebShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends ShopBascController{

    public function orderCreate(Request $request)
    {
        $cart_id = $request->post('cart_id');
        $carts = ShopCart::whereIn('cart_id',explode(',',$cart_id))->get();
        if($carts->isEmpty()){
            return $this->failed('参数不正确');
        }
        foreach ($carts as $cart){
            if($cart->shop_id != $this->shop_id || $cart->buyer_id != $this->member->member_id || is_null($cart)){
                return $this->failed('参数不正确');
            }
        }
        $shop = WebShop::whereShopId($this->shop_id)->value('shop_name');
        $member_points = $this->member->member_points;

    }

}
