<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMansong
 * 
 * @property int $mansong_id
 * @property int $company_id
 * @property string $mansong_name
 * @property int $start_time
 * @property int $end_time
 * @property bool $state
 * @property string $remark
 *
 * @package App\Models
 */
class 7rMansong extends Eloquent
{
	protected $table = '7r_mansong';
	protected $primaryKey = 'mansong_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
		'state' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'mansong_name',
		'start_time',
		'end_time',
		'state',
		'remark'
	];
}
