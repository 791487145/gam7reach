<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rEmploy
 * 
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $nickname
 * @property string $mobile
 * @property string $work_no
 * @property int $company_id
 * @property int $department_id
 * @property int $shop_id
 * @property int $sex
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $role_id
 *
 * @package App\Models
 */
class 7rEmploy extends Eloquent
{
	protected $table = '7r_employ';

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
}
