<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRole
 * 
 * @property int $id
 * @property string $role_name
 * @property string $limits
 * @property int $company_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $preinstall_role
 *
 * @package App\Models
 */
class 7rRole extends Eloquent
{
	protected $table = '7r_role';

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
		'preinstall_role'
	];
}
