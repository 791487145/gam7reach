<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rExpress
 * 
 * @property bool $id
 * @property string $e_name
 * @property string $e_state
 * @property string $e_code
 * @property string $e_letter
 * @property string $e_order
 * @property string $e_url
 * @property int $e_zt_state
 *
 * @package App\Models
 */
class 7rExpress extends Eloquent
{
	protected $table = '7r_express';
	public $timestamps = false;

	protected $casts = [
		'e_zt_state' => 'int'
	];

	protected $fillable = [
		'e_name',
		'e_state',
		'e_code',
		'e_letter',
		'e_order',
		'e_url',
		'e_zt_state'
	];
}
