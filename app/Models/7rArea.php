<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rArea
 * 
 * @property int $area_id
 * @property string $area_name
 * @property int $area_parent_id
 * @property int $area_sort
 * @property bool $area_deep
 * @property string $area_region
 *
 * @package App\Models
 */
class 7rArea extends Eloquent
{
	protected $table = '7r_area';
	protected $primaryKey = 'area_id';
	public $timestamps = false;

	protected $casts = [
		'area_parent_id' => 'int',
		'area_sort' => 'int',
		'area_deep' => 'bool'
	];

	protected $fillable = [
		'area_name',
		'area_parent_id',
		'area_sort',
		'area_deep',
		'area_region'
	];
}
