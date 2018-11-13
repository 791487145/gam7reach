<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAdmin
 * 
 * @property int $admin_id
 * @property string $admin_name
 * @property string $admin_password
 * @property int $admin_login_time
 * @property int $admin_login_num
 * @property bool $admin_is_super
 * @property int $admin_role_id
 *
 * @package App\Models
 */
class 7rAdmin extends Eloquent
{
	protected $table = '7r_admin';
	protected $primaryKey = 'admin_id';
	public $timestamps = false;

	protected $casts = [
		'admin_login_time' => 'int',
		'admin_login_num' => 'int',
		'admin_is_super' => 'bool',
		'admin_role_id' => 'int'
	];

	protected $hidden = [
		'admin_password'
	];

	protected $fillable = [
		'admin_name',
		'admin_password',
		'admin_login_time',
		'admin_login_num',
		'admin_is_super',
		'admin_role_id'
	];
}
