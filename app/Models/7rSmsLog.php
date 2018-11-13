<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rSmsLog
 * 
 * @property int $log_id
 * @property string $log_phone
 * @property string $log_captcha
 * @property string $log_ip
 * @property string $log_msg
 * @property bool $log_type
 * @property int $add_time
 * @property int $member_id
 * @property string $member_name
 *
 * @package App\Models
 */
class 7rSmsLog extends Eloquent
{
	protected $table = '7r_sms_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'log_type' => 'bool',
		'add_time' => 'int',
		'member_id' => 'int'
	];

	protected $fillable = [
		'log_phone',
		'log_captcha',
		'log_ip',
		'log_msg',
		'log_type',
		'add_time',
		'member_id',
		'member_name'
	];
}
