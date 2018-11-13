<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rOrderShopGood
 * 
 * @property int $rec_id
 * @property int $order_id
 * @property int $shop_goods_id
 * @property string $goods_name
 * @property float $goods_price
 * @property int $goods_num
 * @property string $goods_image
 * @property float $goods_pay_price
 * @property int $shop_id
 * @property int $buyer_id
 * @property string $goods_type
 * @property int $promotions_id
 * @property int $gc_id
 *
 * @package App\Models
 */
class 7rOrderShopGood extends Eloquent
{
	protected $primaryKey = 'rec_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'shop_goods_id' => 'int',
		'goods_price' => 'float',
		'goods_num' => 'int',
		'goods_pay_price' => 'float',
		'shop_id' => 'int',
		'buyer_id' => 'int',
		'promotions_id' => 'int',
		'gc_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'shop_goods_id',
		'goods_name',
		'goods_price',
		'goods_num',
		'goods_image',
		'goods_pay_price',
		'shop_id',
		'buyer_id',
		'goods_type',
		'promotions_id',
		'gc_id'
	];
}
