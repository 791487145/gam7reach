<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
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
 */
	class CouponShop extends \Eloquent {}
}

