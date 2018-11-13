<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMPointsLog
 * 
 * @property int $pl_id
 * @property int $pl_memberid
 * @property string $pl_membername
 * @property int $pl_employ_id
 * @property string $pl_adminname
 * @property int $pl_points
 * @property int $pl_addtime
 * @property string $pl_desc
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rMPointsLog extends Eloquent
{
	protected $table = '7r_m_points_log';
	protected $primaryKey = 'pl_id';
	public $timestamps = false;

	protected $casts = [
		'pl_memberid' => 'int',
		'pl_employ_id' => 'int',
		'pl_points' => 'int',
		'pl_addtime' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'pl_memberid',
		'pl_membername',
		'pl_employ_id',
		'pl_adminname',
		'pl_points',
		'pl_addtime',
		'pl_desc',
		'company_id'
	];
}
