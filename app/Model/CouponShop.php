<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 03 Dec 2018 09:03:33 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\CouponShop
 *
 * @property int $id 主键id
 * @property int $coupon_t_id 优惠券id
 * @property int $shop_id 旗舰店id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop whereCouponTId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CouponShop whereShopId($value)
 * @mixin \Eloquent
 */
class CouponShop extends Eloquent
{
	protected $table = '7r_coupon_shop';
	public $timestamps = false;

	protected $casts = [
		'coupon_t_id' => 'int',
		'shop_id' => 'int'
	];

	protected $fillable = [
		'coupon_t_id',
		'shop_id'
	];
}
