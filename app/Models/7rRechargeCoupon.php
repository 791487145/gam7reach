<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRechargeCoupon
 * 
 * @property int $id
 * @property int $rec_id
 * @property int $coupon_t_id
 * @property int $coupon_num
 *
 * @package App\Models
 */
class 7rRechargeCoupon extends Eloquent
{
	protected $table = '7r_recharge_coupon';
	public $timestamps = false;

	protected $casts = [
		'rec_id' => 'int',
		'coupon_t_id' => 'int',
		'coupon_num' => 'int'
	];

	protected $fillable = [
		'rec_id',
		'coupon_t_id',
		'coupon_num'
	];
}
