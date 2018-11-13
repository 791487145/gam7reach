<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCompanyMsgTpl
 * 
 * @property int $id
 * @property int $smt_message_switch
 * @property int $smt_short_switch
 * @property int $company_id
 * @property int $smt_id
 *
 * @package App\Models
 */
class 7rCompanyMsgTpl extends Eloquent
{
	protected $table = '7r_company_msg_tpl';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'smt_message_switch' => 'int',
		'smt_short_switch' => 'int',
		'company_id' => 'int',
		'smt_id' => 'int'
	];

	protected $fillable = [
		'smt_message_switch',
		'smt_short_switch',
		'company_id',
		'smt_id'
	];
}
