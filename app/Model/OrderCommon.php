<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 05:44:34 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\OrderCommon
 *
 * @property int $order_id 订单索引id
 * @property int $shipping_time 配送时间
 * @property bool $shipping_express_id 配送公司ID
 * @property int $evaluation_time 评价时间
 * @property string $evalseller_state 卖家是否已评价买家
 * @property int $evalseller_time 卖家评价买家的时间
 * @property string|null $order_message 订单留言
 * @property int $order_pointscount 订单赠送积分
 * @property int|null $coupon_price 优惠券金额
 * @property string|null $coupon_code 优惠券编码
 * @property string|null $deliver_explain 发货备注
 * @property string $reciver_name 收货人姓名
 * @property string $reciver_info 收货人其它信息（序列化json）
 * @property string $reciver_address 省市区（json）
 * @property string|null $promotion_info 促销信息备注（序列化或json）
 * @property string|null $dlyo_pickup_code 提货码
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereCouponPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereDeliverExplain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereDlyoPickupCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereEvalsellerState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereEvalsellerTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereEvaluationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereOrderMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereOrderPointscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon wherePromotionInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereReciverAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereReciverInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereReciverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereShippingExpressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderCommon whereShippingTime($value)
 * @mixin \Eloquent
 */
class OrderCommon extends Eloquent
{
	protected $table = '7r_order_common';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'shipping_time' => 'int',
		'shipping_express_id' => 'bool',
		'evaluation_time' => 'int',
		'evalseller_time' => 'int',
		'order_pointscount' => 'int',
		'coupon_price' => 'int'
	];

	protected $fillable = [
		'shipping_time',
		'shipping_express_id',
		'evaluation_time',
		'evalseller_state',
		'evalseller_time',
		'order_message',
		'order_pointscount',
		'coupon_price',
		'coupon_code',
		'deliver_explain',
		'reciver_name',
		'reciver_info',
		'reciver_address',
		'promotion_info',
		'dlyo_pickup_code'
	];
}
