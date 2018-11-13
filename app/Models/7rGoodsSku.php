<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGoodsSku
 * 
 * @property int $sku_id
 * @property int $goods_id
 * @property string $sp_value_id_path
 * @property float $sku_price
 *
 * @package App\Models
 */
class 7rGoodsSku extends Eloquent
{
	protected $table = '7r_goods_sku';
	protected $primaryKey = 'sku_id';
	public $timestamps = false;

	protected $casts = [
		'goods_id' => 'int',
		'sku_price' => 'float'
	];

	protected $fillable = [
		'goods_id',
		'sp_value_id_path',
		'sku_price'
	];
}
