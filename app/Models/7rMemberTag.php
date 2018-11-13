<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

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
class 7rMemberTag extends Eloquent
{
	protected $table = '7r_member_tag';
	protected $primaryKey = 'mtag_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int'
	];

	protected $fillable = [
		'mtag_name',
		'mtag_setting',
		'company_id'
	];
}
