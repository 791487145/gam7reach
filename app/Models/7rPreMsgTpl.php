<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPreMsgTpl
 * 
 * @property int $smt_id
 * @property string $smt_name
 * @property string $smt_message_content
 * @property string $smt_short_content
 *
 * @package App\Models
 */
class 7rPreMsgTpl extends Eloquent
{
	protected $table = '7r_pre_msg_tpl';
	protected $primaryKey = 'smt_id';
	public $timestamps = false;

	protected $fillable = [
		'smt_name',
		'smt_message_content',
		'smt_short_content'
	];
}
