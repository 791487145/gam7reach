<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 07:58:36 +0000.
 */

namespace App\Model;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Menus
 *
 * @property int $id
 * @property string|null $name 菜单名称
 * @property string|null $url 链接
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $_lft 左标号
 * @property int $_rgt 右标号
 * @property int|null $parent_id 父id
 * @property string|null $title 菜单名
 * @property-read \Kalnoy\Nestedset\Collection|\App\Model\Menus[] $children
 * @property-read \App\Model\Menus|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus d()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Menus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menus whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Menus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Menus withoutTrashed()
 * @mixin \Eloquent
 */
class Menus extends Eloquent
{
    use NodeTrait,SoftDeletes;

    protected $table = '7r_menus';
    protected $primaryKey = 'id';
    public $timestamps = true;

	protected $casts = [
		'_lft' => 'int',
		'_rgt' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'url',
		'_lft',
		'_rgt',
		'parent_id',
		'title'
	];
}
