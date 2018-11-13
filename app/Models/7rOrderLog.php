<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rOrderLog
 * 
 * @property int $log_id
 * @property int $order_id
 * @property string $log_msg
 * @property int $log_time
 * @property string $log_role
 * @property string $log_user
 * @property string $log_orderstate
 *
 * @package App\Models
 */
class 7rOrderLog extends Eloquent
{
	protected $table = '7r_order_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'log_time' => 'int'
	];

	protected $fillable = [
		'order_id',
		'log_msg',
		'log_time',
		'log_role',
		'log_user',
		'log_orderstate'
	];
}
