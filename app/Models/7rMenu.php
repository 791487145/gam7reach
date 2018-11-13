<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMenu
 * 
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property float $sale
 * @property string $url
 * @property string $title
 * @property bool $side
 * @property int $parent_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rMenu extends Eloquent
{
	protected $table = '7r_menu';

	protected $casts = [
		'sort' => 'int',
		'sale' => 'float',
		'side' => 'bool',
		'parent_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'name',
		'sort',
		'sale',
		'url',
		'title',
		'side',
		'parent_id'
	];
}
