<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCron
 * 
 * @property int $id
 * @property int $type
 * @property int $exeid
 * @property int $exetime
 *
 * @package App\Models
 */
class 7rCron extends Eloquent
{
	protected $table = '7r_cron';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'exeid' => 'int',
		'exetime' => 'int'
	];

	protected $fillable = [
		'type',
		'exeid',
		'exetime'
	];
}
