<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:16 +0000.
 */

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Model\Employ
 *
 * @property int $id
 * @property string|null $name 姓名
 * @property string $password 密码
 * @property string|null $nickname 昵称
 * @property string $mobile 手机号
 * @property string|null $work_no 工号
 * @property int|null $company_id 企业id
 * @property int|null $department_id 部门
 * @property int|null $shop_id 所属门店
 * @property int|null $sex 1:男0女
 * @property int|null $status 1正常；2禁止
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $role_id 角色id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Employ whereWorkNo($value)
 * @mixin \Eloquent
 */
class Employ extends Authenticatable implements JWTSubject
{
    use Notifiable;

	protected $table = '7r_employ';

    protected $dateFormat = 'U';

	protected $casts = [
		'company_id' => 'int',
		'department_id' => 'int',
		'shop_id' => 'int',
		'sex' => 'int',
		'status' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'role_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'password',
		'nickname',
		'mobile',
		'work_no',
		'company_id',
		'department_id',
		'shop_id',
		'sex',
		'status',
		'role_id'
	];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return array(['company_id' => $this->getCompany()]);
    }

}
