<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rTouchMsgTp
 * 
 * @property int $id
 * @property int $tp_id
 * @property string $tp_title
 * @property string $tp_content
 * @property int $created_at
 * @property int $update_at
 *
 * @package App\Models
 */
class 7rTouchMsgTp extends Eloquent
{
	protected $table = '7r_touch_msg_tp';
	public $timestamps = false;

	protected $casts = [
		'tp_id' => 'int',
		'created_at' => 'int',
		'update_at' => 'int'
	];

	protected $fillable = [
		'tp_id',
		'tp_title',
		'tp_content',
		'update_at'
	];
}
