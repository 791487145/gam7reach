<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRegisionManager
 * 
 * @property int $id
 * @property string $mobile
 * @property string $name
 * @property int $reg_employ_id
 * @property int $created_at
 * @property int $updated_at
 * @property string $description
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rRegisionManager extends Eloquent
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
