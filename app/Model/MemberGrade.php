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
 * @package App\Models
 * @property string|null $grade_description 等级描述
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade enable()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeExppoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereGradeRights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberGrade whereIsEnable($value)
 * @mixin \Eloquent
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
