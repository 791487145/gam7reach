<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGoodsImage
 * 
 * @property int $goods_image_id
 * @property int $goods_commonid
 * @property int $company_id
 * @property string $goods_image
 * @property int $goods_image_sort
 *
 * @package App\Models
 */
class 7rGoodsImage extends Eloquent
{
	protected $primaryKey = 'goods_image_id';
	public $timestamps = false;

	protected $casts = [
		'goods_commonid' => 'int',
		'company_id' => 'int',
		'goods_image_sort' => 'int'
	];

	protected $fillable = [
		'goods_commonid',
		'company_id',
		'goods_image',
		'goods_image_sort'
	];
}
