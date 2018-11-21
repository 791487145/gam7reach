<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

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
class MemberGrade extends Eloquent
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
        'grade_description',
		'grade_exppoints',
		'grade_rights',
		'is_enable',
		'company_id'
	];
    /**
     * 限制查询启用的等级
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEnable($query)
    {
        return $query->where('is_enable',1);
    }
}
