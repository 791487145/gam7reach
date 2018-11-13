<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rOrderCommon
 * 
 * @property int $order_id
 * @property int $shipping_time
 * @property bool $shipping_express_id
 * @property int $evaluation_time
 * @property string $evalseller_state
 * @property int $evalseller_time
 * @property string $order_message
 * @property int $order_pointscount
 * @property int $coupon_price
 * @property string $coupon_code
 * @property string $deliver_explain
 * @property string $reciver_name
 * @property string $reciver_info
 * @property int $reciver_province_id
 * @property int $reciver_city_id
 * @property string $promotion_info
 * @property string $dlyo_pickup_code
 *
 * @package App\Models
 */
class 7rOrderCommon extends Eloquent
{
	protected $table = '7r_order_common';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'shipping_time' => 'int',
		'shipping_express_id' => 'bool',
		'evaluation_time' => 'int',
		'evalseller_time' => 'int',
		'order_pointscount' => 'int',
		'coupon_price' => 'int',
		'reciver_province_id' => 'int',
		'reciver_city_id' => 'int'
	];

	protected $fillable = [
		'shipping_time',
		'shipping_express_id',
		'evaluation_time',
		'evalseller_state',
		'evalseller_time',
		'order_message',
		'order_pointscount',
		'coupon_price',
		'coupon_code',
		'deliver_explain',
		'reciver_name',
		'reciver_info',
		'reciver_province_id',
		'reciver_city_id',
		'promotion_info',
		'dlyo_pickup_code'
	];
}
