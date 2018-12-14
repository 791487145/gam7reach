<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:16 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\MainCategory
 *
 * @property int $id 索引ID
 * @property string $name 分类名称
 * @property bool $sort 排序
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MainCategory whereSort($value)
 * @mixin \Eloquent
 */
class MainCategory extends Eloquent
{
	protected $table = '7r_main_category';
	public $timestamps = false;

	protected $casts = [
		'sort' => 'bool'
	];

	protected $fillable = [
		'name',
		'sort'
	];
}
