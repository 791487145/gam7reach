<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMemberGuide
 * 
 * @property int $id
 * @property int $member_id
 * @property int $shopping_guide_id
 *
 * @package App\Models
 */
class 7rMemberGuide extends Eloquent
{
	protected $table = '7r_member_guide';
	public $timestamps = false;

	protected $casts = [
		'member_id' => 'int',
		'shopping_guide_id' => 'int'
	];

	protected $fillable = [
		'member_id',
		'shopping_guide_id'
	];
}
