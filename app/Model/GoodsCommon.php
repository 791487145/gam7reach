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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon whereGoodsCommonid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon whereSpecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsCommon whereSpecName($value)
 * @mixin \Eloquent
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
