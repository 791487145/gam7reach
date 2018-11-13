<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAdminRole
 * 
 * @property int $id
 * @property string $role_name
 * @property string $limits
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rAdminRole extends Eloquent
{
	protected $table = '7r_admin_role';

	protected $casts = [
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'role_name',
		'limits'
	];
}
