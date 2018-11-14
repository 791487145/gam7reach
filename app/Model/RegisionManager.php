<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\RegisionManager
 *
 * @property int $id
 * @property string|null $mobile 联系电话
 * @property string $name 区域名称
 * @property int $reg_employ_id 区域负责人id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $description 区域介绍
 * @property int $company_id 企业id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereRegEmployId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RegisionManager whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RegisionManager extends Eloquent
{
	protected $table = '7r_regision_manager';

	protected $casts = [
		'reg_employ_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'mobile',
		'name',
		'reg_employ_id',
		'description',
		'company_id'
	];
}
