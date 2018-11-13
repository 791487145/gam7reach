<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMansongShopGood
 * 
 * @property int $ms_store_goods_id
 * @property int $mansong_id
 * @property string $mansong_name
 * @property int $shop_goods_id
 * @property string $goods_name
 * @property float $goods_price
 * @property string $goods_image
 * @property int $start_time
 * @property int $end_time
 * @property int $state
 *
 * @package App\Models
 */
class 7rMansongShopGood extends Eloquent
{
	protected $primaryKey = 'ms_store_goods_id';
	public $timestamps = false;

	protected $casts = [
		'mansong_id' => 'int',
		'shop_goods_id' => 'int',
		'goods_price' => 'float',
		'start_time' => 'int',
		'end_time' => 'int',
		'state' => 'int'
	];

	protected $fillable = [
		'mansong_id',
		'mansong_name',
		'shop_goods_id',
		'goods_name',
		'goods_price',
		'goods_image',
		'start_time',
		'end_time',
		'state'
	];
}
