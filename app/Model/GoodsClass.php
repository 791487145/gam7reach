<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Model;

use Kalnoy\Nestedset\NodeTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\GoodsClass
 *
 * @property int $gc_id 索引ID
 * @property string $gc_name 分类名称
 * @property int|null $parent_id 父ID
 * @property int|null $_lft
 * @property int|null $_rgt
 * @property-read \Kalnoy\Nestedset\Collection|\App\Model\GoodsClass[] $children
 * @property-read \App\Model\GoodsClass|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass d()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass whereGcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass whereGcName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsClass whereRgt($value)
 * @mixin \Eloquent
 */
class GoodsClass extends Eloquent
{
    use NodeTrait;
	protected $table = '7r_goods_class';
	protected $primaryKey = 'gc_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
	];

	protected $fillable = [
		'gc_name',
		'parent_id',
        '_lft',
        '_rgt',
	];
}
