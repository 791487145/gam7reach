<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rIconClass
 * 
 * @property int $icon_class_id
 * @property string $icon_class_name
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rIconClass extends Eloquent
{
	protected $table = '7r_icon_class';
	protected $primaryKey = 'icon_class_id';

	protected $casts = [
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'icon_class_name'
	];
}
