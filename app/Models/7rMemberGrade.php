<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMemberGrade
 * 
 * @property int $grade_id
 * @property string $grade_level
 * @property string $grade_name
 * @property int $grade_exppoints
 * @property string $grade_rights
 * @property int $is_enable
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rMemberGrade extends Eloquent
{
	protected $table = '7r_member_grade';
	protected $primaryKey = 'grade_id';
	public $timestamps = false;

	protected $casts = [
		'grade_exppoints' => 'int',
		'is_enable' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'grade_level',
		'grade_name',
		'grade_exppoints',
		'grade_rights',
		'is_enable',
		'company_id'
	];
}
