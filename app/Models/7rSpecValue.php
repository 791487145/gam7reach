<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rSpecValue
 * 
 * @property int $sp_value_id
 * @property string $sp_value_name
 * @property int $sp_id
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rSpecValue extends Eloquent
{
	protected $table = '7r_spec_value';
	protected $primaryKey = 'sp_value_id';
	public $timestamps = false;

	protected $casts = [
		'sp_id' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'sp_value_name',
		'sp_id',
		'company_id'
	];
}
