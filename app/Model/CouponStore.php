<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCouponStore
 * 
 * @property int $id
 * @property int $coupon_t_id
 * @property int $store_id
 *
 * @package App\Models
 */
class CouponStore extends Eloquent
{
	protected $table = '7r_coupon_store';
	public $timestamps = false;

	protected $casts = [
		'coupon_t_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'coupon_t_id',
		'store_id'
	];
}
