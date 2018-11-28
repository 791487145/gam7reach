<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
=======
 * Date: Mon, 26 Nov 2018 09:28:16 +0000.
>>>>>>> upstream/master
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGood
 * 
 * @property int $goods_id
 * @property string $goods_spuno
 * @property string $goods_name
 * @property int $goods_group_id
 * @property string $goods_jingle
 * @property int $company_id
 * @property int $gc_id
 * @property float $goods_price
 * @property float $goods_marketprice
 * @property string $goods_serial
 * @property string $goods_image
 * @property int $goods_state
 * @property int $goods_addtime
 * @property int $goods_edittime
 * @property string $goods_body
 *
 * @package App\Models
 */
class 7rGood extends Eloquent
{
	protected $primaryKey = 'goods_id';
	public $timestamps = false;

	protected $casts = [
		'goods_group_id' => 'int',
		'company_id' => 'int',
		'gc_id' => 'int',
		'goods_price' => 'float',
		'goods_marketprice' => 'float',
		'goods_state' => 'int',
		'goods_addtime' => 'int',
		'goods_edittime' => 'int'
	];

	protected $fillable = [
		'goods_spuno',
		'goods_name',
		'goods_group_id',
		'goods_jingle',
		'company_id',
		'gc_id',
		'goods_price',
		'goods_marketprice',
		'goods_serial',
		'goods_image',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_body'
	];
}
