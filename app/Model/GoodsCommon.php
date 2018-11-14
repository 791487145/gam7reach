<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGoodsCommon
 * 
 * @property int $goods_commonid
 * @property int $goods_id
 * @property int $spec_id
 * @property string $spec_name
 *
 * @package App\Models
 */
class GoodsCommon extends Eloquent
{
	protected $table = '7r_goods_common';
	protected $primaryKey = 'goods_commonid';
	public $timestamps = false;

	protected $casts = [
		'goods_id' => 'int',
		'spec_id' => 'int'
	];

	protected $fillable = [
		'goods_id',
		'spec_id',
		'spec_name'
	];
}
