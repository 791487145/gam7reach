<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPdLog
 * 
 * @property int $lg_id
 * @property int $lg_company_id
 * @property string $lg_company_name
 * @property string $lg_admin_name
 * @property string $lg_type
 * @property float $lg_av_amount
 * @property float $lg_freeze_amount
 * @property int $lg_add_time
 * @property string $lg_desc
 *
 * @package App\Models
 */
class 7rPdLog extends Eloquent
{
	protected $table = '7r_pd_log';
	protected $primaryKey = 'lg_id';
	public $timestamps = false;

	protected $casts = [
		'lg_company_id' => 'int',
		'lg_av_amount' => 'float',
		'lg_freeze_amount' => 'float',
		'lg_add_time' => 'int'
	];

	protected $fillable = [
		'lg_company_id',
		'lg_company_name',
		'lg_admin_name',
		'lg_type',
		'lg_av_amount',
		'lg_freeze_amount',
		'lg_add_time',
		'lg_desc'
	];
}
