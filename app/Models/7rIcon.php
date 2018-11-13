<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rIcon
 * 
 * @property int $icon_id
 * @property int $icon_class
 * @property string $icon_url
 * @property string $icon_spec
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rIcon extends Eloquent
{
	protected $table = '7r_icon';
	protected $primaryKey = 'icon_id';

	protected $casts = [
		'icon_class' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'icon_class',
		'icon_url',
		'icon_spec'
	];
}
