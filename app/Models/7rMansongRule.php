<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMansongRule
 * 
 * @property int $rule_id
 * @property int $mansong_id
 * @property float $price
 * @property int $discount
 * @property string $mansong_goods_name
 * @property int $goods_id
 * @property int $points
 *
 * @package App\Models
 */
class 7rMansongRule extends Eloquent
{
	protected $table = '7r_mansong_rule';
	protected $primaryKey = 'rule_id';
	public $timestamps = false;

	protected $casts = [
		'mansong_id' => 'int',
		'price' => 'float',
		'discount' => 'int',
		'goods_id' => 'int',
		'points' => 'int'
	];

	protected $fillable = [
		'mansong_id',
		'price',
		'discount',
		'mansong_goods_name',
		'goods_id',
		'points'
	];
}
