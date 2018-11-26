<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\OrderShopGood
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderShopGood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderShopGood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderShopGood query()
 * @mixin \Eloquent
 */
class OrderShopGood extends Eloquent
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
