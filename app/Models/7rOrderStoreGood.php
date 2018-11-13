<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rOrderStoreGood
 * 
 * @property int $rec_id
 * @property int $order_id
 * @property int $store_goods_id
 * @property string $goods_name
 * @property float $goods_price
 * @property int $goods_num
 * @property string $goods_image
 * @property float $goods_pay_price
 * @property int $store_id
 * @property int $buyer_id
 * @property string $goods_type
 * @property int $promotions_id
 * @property int $gc_id
 *
 * @package App\Models
 */
class 7rOrderStoreGood extends Eloquent
{
	protected $primaryKey = 'rec_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'store_goods_id' => 'int',
		'goods_price' => 'float',
		'goods_num' => 'int',
		'goods_pay_price' => 'float',
		'store_id' => 'int',
		'buyer_id' => 'int',
		'promotions_id' => 'int',
		'gc_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'store_goods_id',
		'goods_name',
		'goods_price',
		'goods_num',
		'goods_image',
		'goods_pay_price',
		'store_id',
		'buyer_id',
		'goods_type',
		'promotions_id',
		'gc_id'
	];
}
