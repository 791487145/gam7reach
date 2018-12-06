<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 03 Dec 2018 09:03:33 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\MCoupon
 *
 * @property int $coupon_id 主键id
 * @property string|null $coupon_code 优惠券编码
 * @property int $coupon_t_id 优惠卷编号
 * @property string $coupon_title 优惠券名称
 * @property string $coupon_desc 优惠券使用说明
 * @property int $coupon_start_date 优惠券有效期开始时间
 * @property int $coupon_end_date 优惠券有效期结束时间
 * @property int $coupon_price 优惠券金额
 * @property float $coupon_limit 优惠券使用门槛 订单满xx
 * @property int $coupon_state 优惠券状态(1-未用,2-已用,3-过期,4-收回)
 * @property int|null $coupon_active_date 优惠券发放日期
 * @property int $coupon_owner_id 优惠券所有者id
 * @property string $coupon_owner_name 优惠券所有者名称
 * @property int|null $coupon_order_id 使用该优惠券的订单编号
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponActiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponTId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MCoupon whereCouponTitle($value)
 * @mixin \Eloquent
 */
class MCoupon extends Eloquent
{
	protected $table = '7r_m_coupon';
	protected $primaryKey = 'coupon_id';
	public $timestamps = false;

	//coupon_state
	const COUPON_STATE_NOT_USE = 1;
    const COUPON_STATE_USED = 2;
    const COUPON_STATE_OVER_TIME = 3;
    const COUPON_STATE_RECYCLE = 4;

	protected $casts = [
		'coupon_t_id' => 'int',
		'coupon_start_date' => 'int',
		'coupon_end_date' => 'int',
		'coupon_price' => 'int',
		'coupon_limit' => 'float',
		'coupon_state' => 'int',
		'coupon_active_date' => 'int',
		'coupon_owner_id' => 'int',
		'coupon_order_id' => 'int'
	];

	protected $fillable = [
		'coupon_code',
		'coupon_t_id',
		'coupon_title',
		'coupon_desc',
		'coupon_start_date',
		'coupon_end_date',
		'coupon_price',
		'coupon_limit',
		'coupon_state',
		'coupon_active_date',
		'coupon_owner_id',
		'coupon_owner_name',
		'coupon_order_id'
	];


}
