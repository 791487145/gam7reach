<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Nov 2018 06:52:56 +0000.
 */

namespace App\Model;

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
 * @property int $company_id
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogCaptcha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereLogType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\SmsLog whereMemberName($value)
 * @mixin \Eloquent
 */
class SmsLog extends Eloquent
{
	protected $table = '7r_sms_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'log_type' => 'int',
		'add_time' => 'int',
		'member_id' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'log_phone',
		'log_captcha',
		'log_ip',
		'log_msg',
		'log_type',
		'add_time',
		'member_id',
		'member_name',
		'company_id'
	];
}
