<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMainCategory
 * 
 * @property int $id
 * @property string $name
 * @property bool $sort
 *
 * @package App\Models
 */
class 7rMainCategory extends Eloquent
{
	protected $table = '7r_main_category';
	public $timestamps = false;

	protected $casts = [
		'sort' => 'bool'
	];

	protected $fillable = [
		'name',
		'sort'
	];
}
