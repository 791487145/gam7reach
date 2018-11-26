<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCouponShop
 * 
 * @property int $id
 * @property int $coupon_t_id
 * @property int $shop_id
 *
 * @package App\Models
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
