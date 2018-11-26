<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\Order
 *
 * @property int $order_id 订单索引id
 * @property int $company_id 企业id
 * @property int $order_flag 订单归属：0旗舰店；1云店
 * @property int $order_type 订单类型 0普通订单；1自提订单
 * @property int $order_sn 订单编号
 * @property int $pay_sn 支付单号
 * @property int $shop_id 旗舰店id
 * @property string|null $shop_name 云店名称
 * @property int $store_id 云店id
 * @property string|null $store_name 云店名称
 * @property int $buyer_id 买家id
 * @property string $buyer_name 买家姓名
 * @property int $add_time 订单生成时间
 * @property int $payment_code 支付方式id
 * @property int|null $payment_time 支付(付款)时间
 * @property int $finnshed_time 订单完成时间
 * @property float $goods_amount 商品总价格
 * @property float $order_amount 订单总价格
 * @property float $pd_amount 预存款支付金额
 * @property float|null $shipping_fee 运费
 * @property int|null $evaluation_state 评价状态 0未评价，1已评价，2已过期未评价
 * @property int $order_state 订单状态：0(已取消)10(默认):未付款;20:已付款;30:已发货;40:已收货;50:退款中
 * @property bool|null $refund_state 退款状态:0是无退款,1是部分退款,2是全部退款
 * @property bool|null $lock_state 锁定状态:0是正常,大于0是锁定,默认是0
 * @property int $delete_state 删除状态0未删除1放入回收站2彻底删除
 * @property float|null $refund_amount 退款金额
 * @property int|null $delay_time 延迟时间,默认为0
 * @property string|null $shipping_code 物流单号
 * @property int $shipping_type 物流方式0物流配送；1到店自提
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereBuyerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereDelayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereDeleteState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereEvaluationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereFinnshedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereGoodsAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereLockState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderFlag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order wherePaySn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order wherePaymentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order wherePaymentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order wherePdAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereRefundState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereShippingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereShippingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereStoreName($value)
 * @mixin \Eloquent
 */
class Order extends Eloquent
{
	protected $table = '7r_order';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'order_flag' => 'int',
		'order_type' => 'int',
		'order_sn' => 'int',
		'pay_sn' => 'int',
		'shop_id' => 'int',
		'store_id' => 'int',
		'buyer_id' => 'int',
		'add_time' => 'int',
		'payment_code' => 'int',
		'payment_time' => 'int',
		'finnshed_time' => 'int',
		'goods_amount' => 'float',
		'order_amount' => 'float',
		'pd_amount' => 'float',
		'shipping_fee' => 'float',
		'evaluation_state' => 'int',
		'order_state' => 'int',
		'refund_state' => 'bool',
		'lock_state' => 'bool',
		'delete_state' => 'int',
		'refund_amount' => 'float',
		'delay_time' => 'int',
		'shipping_type' => 'int'
	];

	protected $fillable = [
		'company_id',
		'order_flag',
		'order_type',
		'order_sn',
		'pay_sn',
		'shop_id',
		'shop_name',
		'store_id',
		'store_name',
		'buyer_id',
		'buyer_name',
		'add_time',
		'payment_code',
		'payment_time',
		'finnshed_time',
		'goods_amount',
		'order_amount',
		'pd_amount',
		'shipping_fee',
		'evaluation_state',
		'order_state',
		'refund_state',
		'lock_state',
		'delete_state',
		'refund_amount',
		'delay_time',
		'shipping_code',
		'shipping_type'
	];
}
