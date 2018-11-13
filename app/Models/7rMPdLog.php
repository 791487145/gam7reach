<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMPdLog
 * 
 * @property int $lg_id
 * @property int $lg_member_id
 * @property string $lg_member_name
 * @property string $lg_employ_name
 * @property string $lg_type
 * @property float $lg_av_amount
 * @property float $lg_freeze_amount
 * @property int $lg_add_time
 * @property string $lg_desc
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rMPdLog extends Eloquent
{
	protected $table = '7r_m_pd_log';
	protected $primaryKey = 'lg_id';
	public $timestamps = false;

	protected $casts = [
		'lg_member_id' => 'int',
		'lg_av_amount' => 'float',
		'lg_freeze_amount' => 'float',
		'lg_add_time' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'lg_member_id',
		'lg_member_name',
		'lg_employ_name',
		'lg_type',
		'lg_av_amount',
		'lg_freeze_amount',
		'lg_add_time',
		'lg_desc',
		'company_id'
	];
}
