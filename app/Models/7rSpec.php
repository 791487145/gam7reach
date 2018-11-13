<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rSpec
 * 
 * @property int $sp_id
 * @property string $sp_name
 * @property bool $sp_sort
 *
 * @package App\Models
 */
class 7rSpec extends Eloquent
{
	protected $table = '7r_spec';
	protected $primaryKey = 'sp_id';
	public $timestamps = false;

	protected $casts = [
		'sp_sort' => 'bool'
	];

	protected $fillable = [
		'sp_name',
		'sp_sort'
	];
}
