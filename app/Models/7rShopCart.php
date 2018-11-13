<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rShopCart
 * 
 * @property int $cart_id
 * @property int $buyer_id
 * @property int $shop_id
 * @property string $shop_name
 * @property int $goods_id
 * @property string $goods_name
 * @property float $goods_price
 * @property int $goods_num
 * @property string $goods_image
 * @property int $bl_id
 *
 * @package App\Models
 */
class 7rShopCart extends Eloquent
{
	protected $table = '7r_shop_cart';
	protected $primaryKey = 'cart_id';
	public $timestamps = false;

	protected $casts = [
		'buyer_id' => 'int',
		'shop_id' => 'int',
		'goods_id' => 'int',
		'goods_price' => 'float',
		'goods_num' => 'int',
		'bl_id' => 'int'
	];

	protected $fillable = [
		'buyer_id',
		'shop_id',
		'shop_name',
		'goods_id',
		'goods_name',
		'goods_price',
		'goods_num',
		'goods_image',
		'bl_id'
	];
}
