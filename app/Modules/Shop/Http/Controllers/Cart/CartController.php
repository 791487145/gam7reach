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
use App\Model\ShopGood;
use App\Model\WebShop;
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

    public function cardCreate(Request $request)
    {
        $message=array(
            'goods_num.required'=>'请填写数值',
            'goods_id.required'=>'商品id短缺',
            'goods_num.integer'=>'只能为整数',
            'goods_num.min'=>'最小值为1',
        );
        $validator=Validator::make($request->all(),[
            'goods_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!$sku = ShopGood::whereShopId($this->shop_id)->whereGoodsId($value)->whereCompanyId($this->company_id)->first()) {
                        $fail('该商品不存在');
                        return;
                    }
                    if (!$sku->goods_state === 0) {
                        $fail('该商品未上架');
                        return;
                    }
                    if ($sku->stock === 2) {
                        $fail('该商品已售完');
                        return;
                    }
                    if ($this->input('amount') > 0 && $sku->goods_storage < $this->input('amount')) {
                        $fail('该商品库存不足');
                        return;
                    }
                },
            ],
            'goods_num' => ['required', 'integer', 'min:1'],
        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }

        $goods_id = $request->post('goods_id');
        $goods_num = $request->post('goods_num');
        if ($cart = $this->member->cart()::whereShopId($this->shop_id)->whereGoodsId($goods_id)->first()) {

            $cart->update([
                'goods_num' => $cart->goods_num + $goods_num,
            ]);
        } else {
            $shop_good = ShopGood::whereGoodsId($goods_id)->whereShopId($this->shop_id)->first();
            $cart = new ShopCart();
            $cart->buyer_id = $this->member->member_id;
            $cart->goods_id = $goods_id;
            $cart->goods_num = $goods_num;
            $cart->shop_id = $this->shop_id;
            $cart->goods_price = $shop_good->goods_shop_price;
            $cart->shop_name = WebShop::whereShopId($this->shop_id)->whereCompanyId($this->company_id)->value('shop_name');
            $cart->goods_image = $shop_good->goods()->value('goods_name');
            $cart->save();
        }

        return $this->message('添加成功');
    }

    public function cardSubmit(Request $request)
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


        ShopCart::cartSub($carts,$this->member);
        $shop = WebShop::whereShopId($this->shop_id)->value('shop_name');
        $member_points = $this->member->member_points;

    }
}
