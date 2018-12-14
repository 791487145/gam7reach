<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:15 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Area
 *
 * @property int $area_id 索引ID
 * @property string $area_name 地区名称
 * @property int $area_parent_id 地区父ID
 * @property int $area_sort 排序
 * @property bool $area_deep 地区深度，从1开始
 * @property string|null $area_region 大区名称
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaDeep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Area whereAreaSort($value)
 * @mixin \Eloquent
 */
class Area extends Eloquent
{
	protected $table = '7r_area';
	protected $primaryKey = 'area_id';
	public $timestamps = false;

	protected $casts = [
		'area_parent_id' => 'int',
		'area_sort' => 'int',
		'area_deep' => 'bool'
	];

	protected $fillable = [
		'area_name',
		'area_parent_id',
		'area_sort',
		'area_deep',
		'area_region'
	];
}
