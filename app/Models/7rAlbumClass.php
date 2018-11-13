<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAlbumClass
 * 
 * @property int $aclass_id
 * @property string $aclass_name
 * @property int $store_id
 * @property int $shop_id
 * @property int $aclass_type
 * @property string $aclass_des
 * @property int $aclass_sort
 * @property string $aclass_cover
 * @property int $upload_time
 * @property bool $is_default
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rAlbumClass extends Eloquent
{
	protected $table = '7r_album_class';
	protected $primaryKey = 'aclass_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'shop_id' => 'int',
		'aclass_type' => 'int',
		'aclass_sort' => 'int',
		'upload_time' => 'int',
		'is_default' => 'bool',
		'company_id' => 'int'
	];

	protected $fillable = [
		'aclass_name',
		'store_id',
		'shop_id',
		'aclass_type',
		'aclass_des',
		'aclass_sort',
		'aclass_cover',
		'upload_time',
		'is_default',
		'company_id'
	];
}
