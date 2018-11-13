<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRefundReason
 * 
 * @property int $reason_id
 * @property string $reason_info
 * @property bool $sort
 * @property int $update_time
 *
 * @package App\Models
 */
class 7rRefundReason extends Eloquent
{
	protected $table = '7r_refund_reason';
	protected $primaryKey = 'reason_id';
	public $timestamps = false;

	protected $casts = [
		'sort' => 'bool',
		'update_time' => 'int'
	];

	protected $fillable = [
		'reason_info',
		'sort',
		'update_time'
	];
}
