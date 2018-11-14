<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:16 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Department
 *
 * @property int $id 部门id
 * @property string $dep_name
 * @property string|null $dep_description 部门介绍
 * @property string|null $dep_tel 联系电话
 * @property int|null $dep_employ_id 部门负责人id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $parent_id 上级部门id
 * @property int $company_id 企业id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereDepDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereDepEmployId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereDepName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereDepTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Eloquent
{
	protected $table = '7r_department';

	protected $casts = [
		'dep_employ_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'parent_id' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'dep_name',
		'dep_description',
		'dep_tel',
		'dep_employ_id',
		'parent_id',
		'company_id'
	];
}
