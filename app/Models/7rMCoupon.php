<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMCoupon
 * 
 * @property int $coupon_id
 * @property string $coupon_code
 * @property int $coupon_t_id
 * @property string $coupon_title
 * @property string $coupon_desc
 * @property int $coupon_start_date
 * @property int $coupon_end_date
 * @property int $coupon_price
 * @property float $coupon_limit
 * @property int $coupon_state
 * @property int $coupon_active_date
 * @property int $coupon_owner_id
 * @property string $coupon_owner_name
 * @property int $coupon_order_id
 *
 * @package App\Models
 */
class 7rMCoupon extends Eloquent
{
	protected $table = '7r_m_coupon';
	protected $primaryKey = 'coupon_id';
	public $timestamps = false;

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
