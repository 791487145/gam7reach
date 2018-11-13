<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRefundReturn
 * 
 * @property int $refund_id
 * @property int $company_id
 * @property int $order_id
 * @property string $order_sn
 * @property string $refund_sn
 * @property int $store_id
 * @property string $store_name
 * @property int $shop_id
 * @property string $shop_name
 * @property int $ is_service
 * @property int $buyer_id
 * @property string $buyer_name
 * @property float $refund_amount
 * @property bool $refund_type
 * @property bool $refund_state
 * @property bool $return_type
 * @property bool $order_lock
 * @property bool $shipping_state
 * @property int $add_time
 * @property int $seller_time
 * @property int $reason_id
 * @property string $reason_info
 * @property string $pic_info
 * @property string $buyer_message
 * @property string $seller_message
 * @property bool $express_id
 * @property string $invoice_no
 * @property int $ship_time
 * @property int $delay_time
 * @property int $receive_time
 * @property string $receive_message
 *
 * @package App\Models
 */
class 7rRefundReturn extends Eloquent
{
	protected $table = '7r_refund_return';
	protected $primaryKey = 'refund_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'order_id' => 'int',
		'store_id' => 'int',
		'shop_id' => 'int',
		' is_service' => 'int',
		'buyer_id' => 'int',
		'refund_amount' => 'float',
		'refund_type' => 'bool',
		'refund_state' => 'bool',
		'return_type' => 'bool',
		'order_lock' => 'bool',
		'shipping_state' => 'bool',
		'add_time' => 'int',
		'seller_time' => 'int',
		'reason_id' => 'int',
		'express_id' => 'bool',
		'ship_time' => 'int',
		'delay_time' => 'int',
		'receive_time' => 'int'
	];

	protected $fillable = [
		'company_id',
		'order_id',
		'order_sn',
		'refund_sn',
		'store_id',
		'store_name',
		'shop_id',
		'shop_name',
		' is_service',
		'buyer_id',
		'buyer_name',
		'refund_amount',
		'refund_type',
		'refund_state',
		'return_type',
		'order_lock',
		'shipping_state',
		'add_time',
		'seller_time',
		'reason_id',
		'reason_info',
		'pic_info',
		'buyer_message',
		'seller_message',
		'express_id',
		'invoice_no',
		'ship_time',
		'delay_time',
		'receive_time',
		'receive_message'
	];
}
