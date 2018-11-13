<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rRechargecard
 * 
 * @property int $id
 * @property int $company_id
 * @property string $card_rule_name
 * @property float $denomination
 * @property int $points
 * @property int $tscreated
 * @property int $state
 *
 * @package App\Models
 */
class 7rRechargecard extends Eloquent
{
	protected $table = '7r_rechargecard';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'denomination' => 'float',
		'points' => 'int',
		'tscreated' => 'int',
		'state' => 'int'
	];

	protected $fillable = [
		'company_id',
		'card_rule_name',
		'denomination',
		'points',
		'tscreated',
		'state'
	];
}
