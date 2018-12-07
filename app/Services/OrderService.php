<?php

namespace App\Services;

use App\Exceptions\CouponCodeUnavailableException;
use App\Model\MAddress;
use App\Model\MCoupon;
use App\Model\Member;
use App\Model\Order;
use App\Model\ShopCart;
use Carbon\Carbon;
use DB;

class OrderService
{
    public function store(Member $member, MAddress $address, $remark, $carts_id, MCoupon $coupon = null)
    {
        if ($coupon) {
            $coupon->checkAvailable($member);
        }
        // 开启一个数据库事务
        $order = DB::transaction(function () use ($member, $address, $remark, $carts_id, $coupon) {

            $order = new Order([
                'total_amount' => 0,
                'company_id' =>
            ]);
            $order->buyer_id = $member->member_id;
            $order->save();

            $totalAmount = 0;
            // 遍历用户提交的 SKU
            foreach (explode(',',$carts_id) as $cart_id) {
                $cart  = ShopCart::find($cart_id);
                // 创建一个 OrderItem 并直接与当前订单关联
                $area_info = json_decode($address->area_info,true);
                $item = $order->order_amount()->make([
                    'order_message' => $remark,
                    'reciver_name'  => $address->true_name,
                    'reciver_info'  => serialize($address),
                    'reciver_address' => json_encode($area_info.$address->address),
                    'order_id' => $order->order_id
                ]);
                $item->product()->associate($sku->product_id);
                $item->productSku()->associate($sku);
                $item->save();
                $totalAmount += $sku->price * $data['amount'];
                if ($sku->decreaseStock($data['amount']) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }
            if ($coupon) {
                // 总金额已经计算出来了，检查是否符合优惠券规则
                $coupon->checkAvailable($member, $totalAmount);
                // 把订单金额修改为优惠后的金额
                $totalAmount = $coupon->getAdjustedPrice($totalAmount);
                // 将订单与优惠券关联
                $order->couponCode()->associate($coupon);
                // 增加优惠券的用量，需判断返回值
                if ($coupon->changeUsed() <= 0) {
                    throw new CouponCodeUnavailableException('该优惠券已被兑完');
                }
            }
            // 更新订单总金额
            $order->update(['total_amount' => $totalAmount]);

            // 将下单的商品从购物车中移除
            $skuIds = collect($carts_id)->pluck('sku_id')->all();
            app(CartService::class)->remove($skuIds);

            return $order;
        });

        // 这里我们直接使用 dispatch 函数
        dispatch(new CloseOrder($order, config('app.order_ttl')));

        return $order;
    }
}
