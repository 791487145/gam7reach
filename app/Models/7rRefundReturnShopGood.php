<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRefundReturnShopGood
 * 
 * @property int $rt_id
 * @property int $refund_id
 * @property int $shop_goods_id
 * @property string $goods_name
 * @property int $goods_num
 * @property string $goods_image
 *
 * @package App\Models
 */
class 7rRefundReturnShopGood extends Eloquent
{
	protected $primaryKey = 'rt_id';
	public $timestamps = false;

	protected $casts = [
		'refund_id' => 'int',
		'shop_goods_id' => 'int',
		'goods_num' => 'int'
	];

	protected $fillable = [
		'refund_id',
		'shop_goods_id',
		'goods_name',
		'goods_num',
		'goods_image'
	];
}
