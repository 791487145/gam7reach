<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rStoreGoodsSku
 * 
 * @property int $store_sku_id
 * @property int $store_goods_id
 * @property int $goods_id
 * @property string $sp_value_id_path
 * @property float $sku_price
 * @property int $sku_goods_storage
 *
 * @package App\Models
 */
class 7rStoreGoodsSku extends Eloquent
{
	protected $table = '7r_store_goods_sku';
	protected $primaryKey = 'store_sku_id';
	public $timestamps = false;

	protected $casts = [
		'store_goods_id' => 'int',
		'goods_id' => 'int',
		'sku_price' => 'float',
		'sku_goods_storage' => 'int'
	];

	protected $fillable = [
		'store_goods_id',
		'goods_id',
		'sp_value_id_path',
		'sku_price',
		'sku_goods_storage'
	];
}
