<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAdminLog
 * 
 * @property int $id
 * @property string $content
 * @property int $createtime
 * @property string $admin_name
 * @property string $ip
 *
 * @package App\Models
 */
class 7rAdminLog extends Eloquent
{
	protected $table = '7r_admin_log';
	public $timestamps = false;

	protected $casts = [
		'createtime' => 'int'
	];

	protected $fillable = [
		'content',
		'createtime',
		'admin_name',
		'ip'
	];
}
