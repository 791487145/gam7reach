<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCAuthentication
 * 
 * @property int $id
 * @property int $company_id
 * @property string $company_name
 * @property string $corporation
 * @property string $ID_front
 * @property string $ID_behind
 * @property string $license_img
 * @property string $license_sn
 * @property int $created_at
 * @property int $updated_at
 * @property int $state
 * @property string $admin_name
 *
 * @package App\Models
 */
class 7rCAuthentication extends Eloquent
{
	protected $table = '7r_c_authentication';

	protected $casts = [
		'company_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'state' => 'int'
	];

	protected $fillable = [
		'company_id',
		'company_name',
		'corporation',
		'ID_front',
		'ID_behind',
		'license_img',
		'license_sn',
		'state',
		'admin_name'
	];
}
