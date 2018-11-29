<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Role
 *
 * @property int $id 角色id
 * @property string $role_name 角色名称
 * @property string|null $limits 角色权限
 * @property int $company_id 企业id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $preinstall_role 预设角色 1超级管理员；2区域管理员；3店长；4店员（导购）
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereLimits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role wherePreinstallRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $deccripe 描述
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereDeccripe($value)
 * @property string|null $descripe 描述
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Role whereDescripe($value)
 */
class Role extends Eloquent
{
	protected $table = '7r_role';
    protected $dateFormat = 'U';

    //preinstall_role
    const PREINSTALL_ROLE_ADMIN = 1;
    const PREINSTALL_ROLE_REGION = 2;
    const PREINSTALL_ROLE_SHOPER = 3;
    const PREINSTALL_ROLE_GUIDE = 4;

	protected $casts = [
		'company_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'preinstall_role' => 'int'
	];

	protected $fillable = [
		'role_name',
		'limits',
		'company_id',
		'preinstall_role',
        'descripe'
	];

}
