<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMember
 * 
 * @property int $member_id
 * @property string $member_truename
 * @property bool $member_sex
 * @property int $member_grade_id
 * @property int $member_birthday
 * @property string $member_paypwd
 * @property string $member_mobile
 * @property int $member_mobile_bind
 * @property string $member_time
 * @property string $member_login_time
 * @property string $member_old_login_time
 * @property string $member_login_ip
 * @property string $member_old_login_ip
 * @property int $source_channel
 * @property string $weixin_unionid
 * @property string $weixin_info
 * @property int $member_points
 * @property float $available_predeposit
 * @property float $freeze_predeposit
 * @property int $member_exppoints
 * @property string $member_wxopenid
 * @property int $company_id
 * @property int $store_id
 *
 * @package App\Models
 */
class 7rMember extends Eloquent
{
	protected $table = '7r_member';
	protected $primaryKey = 'member_id';
	public $timestamps = false;

	protected $casts = [
		'member_sex' => 'bool',
		'member_grade_id' => 'int',
		'member_birthday' => 'int',
		'member_mobile_bind' => 'int',
		'source_channel' => 'int',
		'member_points' => 'int',
		'available_predeposit' => 'float',
		'freeze_predeposit' => 'float',
		'member_exppoints' => 'int',
		'company_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'member_truename',
		'member_sex',
		'member_grade_id',
		'member_birthday',
		'member_paypwd',
		'member_mobile',
		'member_mobile_bind',
		'member_time',
		'member_login_time',
		'member_old_login_time',
		'member_login_ip',
		'member_old_login_ip',
		'source_channel',
		'weixin_unionid',
		'weixin_info',
		'member_points',
		'available_predeposit',
		'freeze_predeposit',
		'member_exppoints',
		'member_wxopenid',
		'company_id',
		'store_id'
	];
}
