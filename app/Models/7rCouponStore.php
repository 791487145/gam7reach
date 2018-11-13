<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

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
class 7rCouponStore extends Eloquent
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
