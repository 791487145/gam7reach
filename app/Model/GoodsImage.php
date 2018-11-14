<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:08 +0000.
 */

namespace App\Model;

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
class GoodsImage extends Eloquent
{
    protected $table='7r_goods_images';
	protected $primaryKey = 'goods_image_id';
	public $timestamps = false;

	protected $casts = [
		'goods_id' => 'int',
		'company_id' => 'int',
		'goods_image_sort' => 'int'
	];

	protected $fillable = [
		'goods_id',
		'company_id',
		'goods_image',
		'goods_image_sort'
	];
}
