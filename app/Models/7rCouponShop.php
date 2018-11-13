<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

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
class 7rCouponShop extends Eloquent
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
