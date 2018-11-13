<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCouponTemplate
 * 
 * @property int $coupon_t_id
 * @property int $company_id
 * @property string $coupon_t_title
 * @property string $coupon_t_desc
 * @property int $coupon_t_start_date
 * @property int $coupon_t_end_date
 * @property float $coupon_t_price
 * @property float $coupon_t_limit
 * @property int $coupon_t_state
 * @property int $coupon_t_total
 * @property int $coupon_t_giveout
 * @property int $coupon_t_used
 * @property int $coupon_t_add_date
 * @property int $coupon_t_eachlimit
 * @property string $coupon_t_style
 * @property bool $coupon_t_recommend
 *
 * @package App\Models
 */
class 7rCouponTemplate extends Eloquent
{
	protected $table = '7r_coupon_template';
	protected $primaryKey = 'coupon_t_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'coupon_t_start_date' => 'int',
		'coupon_t_end_date' => 'int',
		'coupon_t_price' => 'float',
		'coupon_t_limit' => 'float',
		'coupon_t_state' => 'int',
		'coupon_t_total' => 'int',
		'coupon_t_giveout' => 'int',
		'coupon_t_used' => 'int',
		'coupon_t_add_date' => 'int',
		'coupon_t_eachlimit' => 'int',
		'coupon_t_recommend' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'coupon_t_title',
		'coupon_t_desc',
		'coupon_t_start_date',
		'coupon_t_end_date',
		'coupon_t_price',
		'coupon_t_limit',
		'coupon_t_state',
		'coupon_t_total',
		'coupon_t_giveout',
		'coupon_t_used',
		'coupon_t_add_date',
		'coupon_t_eachlimit',
		'coupon_t_style',
		'coupon_t_recommend'
	];
}
