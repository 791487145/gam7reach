<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rXianshiShopGood
 * 
 * @property int $xs_store_goods_id
 * @property int $xianshi_id
 * @property string $xianshi_name
 * @property string $xianshi_title
 * @property string $xianshi_explain
 * @property int $store_goods_id
 * @property string $goods_name
 * @property float $goods_price
 * @property float $xianshi_price
 * @property string $goods_image
 * @property int $start_time
 * @property int $end_time
 * @property int $lower_limit
 * @property int $state
 *
 * @package App\Models
 */
class 7rXianshiShopGood extends Eloquent
{
	protected $primaryKey = 'xs_store_goods_id';
	public $timestamps = false;

	protected $casts = [
		'xianshi_id' => 'int',
		'store_goods_id' => 'int',
		'goods_price' => 'float',
		'xianshi_price' => 'float',
		'start_time' => 'int',
		'end_time' => 'int',
		'lower_limit' => 'int',
		'state' => 'int'
	];

	protected $fillable = [
		'xianshi_id',
		'xianshi_name',
		'xianshi_title',
		'xianshi_explain',
		'store_goods_id',
		'goods_name',
		'goods_price',
		'xianshi_price',
		'goods_image',
		'start_time',
		'end_time',
		'lower_limit',
		'state'
	];
}
