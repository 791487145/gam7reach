<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMtagMember
 * 
 * @property int $id
 * @property int $mtag_id
 * @property int $member_id
 * @property int $recommend
 *
 * @package App\Models
 */
class 7rMtagMember extends Eloquent
{
	protected $table = '7r_mtag_member';
	public $timestamps = false;

	protected $casts = [
		'mtag_id' => 'int',
		'member_id' => 'int',
		'recommend' => 'int'
	];

	protected $fillable = [
		'mtag_id',
		'member_id',
		'recommend'
	];
}
