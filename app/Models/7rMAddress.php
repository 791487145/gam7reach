<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMAddress
 * 
 * @property int $address_id
 * @property int $member_id
 * @property string $true_name
 * @property int $area_id
 * @property int $city_id
 * @property string $area_info
 * @property string $address
 * @property string $mob_phone
 * @property string $is_default
 *
 * @package App\Models
 */
class 7rMAddress extends Eloquent
{
	protected $table = '7r_m_address';
	protected $primaryKey = 'address_id';
	public $timestamps = false;

	protected $casts = [
		'member_id' => 'int',
		'area_id' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'member_id',
		'true_name',
		'area_id',
		'city_id',
		'area_info',
		'address',
		'mob_phone',
		'is_default'
	];
}
