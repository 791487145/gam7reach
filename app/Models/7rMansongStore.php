<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMansongStore
 * 
 * @property int $id
 * @property int $mansong_id
 * @property int $store_id
 *
 * @package App\Models
 */
class 7rMansongStore extends Eloquent
{
	protected $table = '7r_mansong_store';
	public $timestamps = false;

	protected $casts = [
		'mansong_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'mansong_id',
		'store_id'
	];
}
