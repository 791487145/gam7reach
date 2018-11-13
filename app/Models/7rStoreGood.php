<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rStoreGood
 * 
 * @property int $store_goods_id
 * @property int $goods_id
 * @property float $goods_store_price
 * @property float $goods_promotion_price
 * @property int $goods_promotion_type
 * @property int $goods_click
 * @property int $goods_salenum
 * @property int $goods_collect
 * @property int $goods_storage
 * @property string $goods_spec
 * @property int $goods_state
 * @property int $goods_addtime
 * @property int $goods_edittime
 * @property float $goods_freight
 * @property int $goods_commend
 * @property int $evaluation_count
 * @property int $store_id
 * @property int $company_id
 * @property int $is_points
 *
 * @package App\Models
 */
class 7rStoreGood extends Eloquent
{
	protected $primaryKey = 'store_goods_id';
	public $timestamps = false;

	protected $casts = [
		'goods_id' => 'int',
		'goods_store_price' => 'float',
		'goods_promotion_price' => 'float',
		'goods_promotion_type' => 'int',
		'goods_click' => 'int',
		'goods_salenum' => 'int',
		'goods_collect' => 'int',
		'goods_storage' => 'int',
		'goods_state' => 'int',
		'goods_addtime' => 'int',
		'goods_edittime' => 'int',
		'goods_freight' => 'float',
		'goods_commend' => 'int',
		'evaluation_count' => 'int',
		'store_id' => 'int',
		'company_id' => 'int',
		'is_points' => 'int'
	];

	protected $fillable = [
		'goods_id',
		'goods_store_price',
		'goods_promotion_price',
		'goods_promotion_type',
		'goods_click',
		'goods_salenum',
		'goods_collect',
		'goods_storage',
		'goods_spec',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_freight',
		'goods_commend',
		'evaluation_count',
		'store_id',
		'company_id',
		'is_points'
	];
}
