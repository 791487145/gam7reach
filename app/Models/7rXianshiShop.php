<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rXianshiShop
 * 
 * @property int $id
 * @property int $xianshi_id
 * @property int $shop_id
 *
 * @package App\Models
 */
class 7rXianshiShop extends Eloquent
{
	protected $table = '7r_xianshi_shop';
	public $timestamps = false;

	protected $casts = [
		'xianshi_id' => 'int',
		'shop_id' => 'int'
	];

	protected $fillable = [
		'xianshi_id',
		'shop_id'
	];
}
