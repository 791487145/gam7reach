<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\OrderStoreGood
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood query()
 * @mixin \Eloquent
 */
class OrderStoreGood extends Eloquent
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
