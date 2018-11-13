<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rXianshi
 * 
 * @property int $xianshi_id
 * @property string $xianshi_name
 * @property string $xianshi_title
 * @property string $xianshi_explain
 * @property int $start_time
 * @property int $end_time
 * @property string $store_name
 * @property int $lower_limit
 * @property int $state
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rXianshi extends Eloquent
{
	protected $table = '7r_xianshi';
	protected $primaryKey = 'xianshi_id';
	public $timestamps = false;

	protected $casts = [
		'start_time' => 'int',
		'end_time' => 'int',
		'lower_limit' => 'int',
		'state' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'xianshi_name',
		'xianshi_title',
		'xianshi_explain',
		'start_time',
		'end_time',
		'store_name',
		'lower_limit',
		'state',
		'company_id'
	];
}
