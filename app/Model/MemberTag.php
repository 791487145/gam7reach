<?php

/**
 * 会员标签模型
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMemberTag
 * 
 * @property int $mtag_id
 * @property string $mtag_name
 * @property string $mtag_setting
 * @property int $company_id
 *
 * @package App\Models
 */
class MemberTag extends Eloquent
{
	protected $table = '7r_member_tag';
	protected $primaryKey = 'tag_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int'
	];

	protected $fillable = [
		'tag_name',
		'mtag_setting',
		'company_id'
	];
}