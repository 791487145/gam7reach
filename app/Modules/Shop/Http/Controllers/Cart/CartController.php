<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:33 AM
 */
namespace  App\Modules\Shop\Http\Controllers\Cart;
use App\Http\Controllers\ShopBascController;
use App\Model\MemberCenterDecoration;
use App\Model\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends ShopBascController{

    /**
     * 购物车列表
     * @param Request $request
     */
    public function carts(Request $request)
    {
        $carts = ShopCart::whereShopId($this->shop_id)->whereBuyerId($this->member->member_id)->cartList();

        $data = array(
            'count' => $carts->count(),
            '$carts' => $carts
        );
        return $this->success($data);
    }

    /**
     * 购物车删除
     * @param Request $request
     * @return mixed
     */
    public function cartDelete(Request $request)
    {
       $cart_id = $request->post('cart_id','');
       if(is_null($cart_id)){
           return $this->failed('参数不能为空');
       }

       ShopCart::destroy($cart_id);
       return $this->message('删除成功');
    }

    /**
     * 购物车数量更改
     * @param Request $request
     * @return mixed
     */
    public function cartUpdate(Request $request)
    {
        $cart = ShopCart::whereCartId($request->post('cart_id'))->first();
        if(is_null($cart)){
            return $this->failed('参数不正确');
        }
        $goods_num = $request->only('goods_num');
        $message=array(
            'goods_num.required'=>'请填写数值',
            'goods_num.numeric'=>'只能为数字',
            'goods_num.integer'=>'只能为整数',
            'goods_num.min'=>'最小值为1',
        );
        $validator=Validator::make($goods_num,[
            'goods_num'=>'required|numeric|integer|min:1',
        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }

        $cart->update($goods_num);
        return $this->message('修改成功');
    }
}
