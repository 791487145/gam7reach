<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rOrder
 * 
 * @property int $order_id
 * @property int $company_id
 * @property int $order_flag
 * @property int $order_type
 * @property int $order_sn
 * @property int $pay_sn
 * @property int $shop_id
 * @property string $shop_name
 * @property int $store_id
 * @property string $store_name
 * @property int $buyer_id
 * @property string $buyer_name
 * @property int $add_time
 * @property int $payment_code
 * @property int $payment_time
 * @property int $finnshed_time
 * @property float $goods_amount
 * @property float $order_amount
 * @property float $pd_amount
 * @property float $shipping_fee
 * @property int $evaluation_state
 * @property int $order_state
 * @property bool $refund_state
 * @property bool $lock_state
 * @property int $delete_state
 * @property float $refund_amount
 * @property int $delay_time
 * @property string $shipping_code
 * @property int $shipping_type
 *
 * @package App\Models
 */
class 7rOrder extends Eloquent
{
	protected $table = '7r_order';
	protected $primaryKey = 'order_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'order_flag' => 'int',
		'order_type' => 'int',
		'order_sn' => 'int',
		'pay_sn' => 'int',
		'shop_id' => 'int',
		'store_id' => 'int',
		'buyer_id' => 'int',
		'add_time' => 'int',
		'payment_code' => 'int',
		'payment_time' => 'int',
		'finnshed_time' => 'int',
		'goods_amount' => 'float',
		'order_amount' => 'float',
		'pd_amount' => 'float',
		'shipping_fee' => 'float',
		'evaluation_state' => 'int',
		'order_state' => 'int',
		'refund_state' => 'bool',
		'lock_state' => 'bool',
		'delete_state' => 'int',
		'refund_amount' => 'float',
		'delay_time' => 'int',
		'shipping_type' => 'int'
	];

	protected $fillable = [
		'company_id',
		'order_flag',
		'order_type',
		'order_sn',
		'pay_sn',
		'shop_id',
		'shop_name',
		'store_id',
		'store_name',
		'buyer_id',
		'buyer_name',
		'add_time',
		'payment_code',
		'payment_time',
		'finnshed_time',
		'goods_amount',
		'order_amount',
		'pd_amount',
		'shipping_fee',
		'evaluation_state',
		'order_state',
		'refund_state',
		'lock_state',
		'delete_state',
		'refund_amount',
		'delay_time',
		'shipping_code',
		'shipping_type'
	];
}
