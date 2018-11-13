<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rDepartment
 * 
 * @property int $id
 * @property string $dep_name
 * @property string $dep_description
 * @property string $dep_tel
 * @property int $dep_employ_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $parent_id
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rDepartment extends Eloquent
{
	protected $table = '7r_department';

	protected $casts = [
		'dep_employ_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'parent_id' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'dep_name',
		'dep_description',
		'dep_tel',
		'dep_employ_id',
		'parent_id',
		'company_id'
	];
}
