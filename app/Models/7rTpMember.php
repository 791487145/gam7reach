<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rTpMember
 * 
 * @property int $mt_id
 * @property int $tp_id
 * @property string $member_id
 *
 * @package App\Models
 */
class 7rTpMember extends Eloquent
{
	protected $table = '7r_tp_member';
	protected $primaryKey = 'mt_id';
	public $timestamps = false;

	protected $casts = [
		'tp_id' => 'int'
	];

	protected $fillable = [
		'tp_id',
		'member_id'
	];
}
