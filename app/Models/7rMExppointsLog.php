<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMExppointsLog
 * 
 * @property int $exp_id
 * @property int $exp_memberid
 * @property string $exp_membername
 * @property int $exp_points
 * @property int $exp_addtime
 * @property string $exp_desc
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rMExppointsLog extends Eloquent
{
	protected $table = '7r_m_exppoints_log';
	protected $primaryKey = 'exp_id';
	public $timestamps = false;

	protected $casts = [
		'exp_memberid' => 'int',
		'exp_points' => 'int',
		'exp_addtime' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'exp_memberid',
		'exp_membername',
		'exp_points',
		'exp_addtime',
		'exp_desc',
		'company_id'
	];
}
