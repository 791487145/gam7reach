<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rTouchPerson
 * 
 * @property int $tc_people_id
 * @property int $company_id
 * @property string $tc_name
 * @property int $preinstall_tc
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rTouchPerson extends Eloquent
{
	protected $primaryKey = 'tc_people_id';

	protected $casts = [
		'company_id' => 'int',
		'preinstall_tc' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'company_id',
		'tc_name',
		'preinstall_tc'
	];
}
