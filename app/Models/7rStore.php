<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rStore
 * 
 * @property int $store_id
 * @property int $company_id
 * @property int $reg_id
 * @property string $store_name
 * @property string $area_info
 * @property string $lon_lati
 * @property string $store_address
 * @property string $store_zip
 * @property int $store_recommend
 * @property bool $store_state
 * @property string $store_close_info
 * @property int $store_sort
 * @property string $store_photo
 * @property string $store_time
 * @property string $store_end_time
 * @property string $store_keywords
 * @property string $store_description
 * @property string $store_phone
 * @property string $store_theme
 * @property int $store_collect
 * @property string $store_slide
 * @property string $good_comment
 * @property int $store_sales
 * @property string $store_presales
 * @property string $store_aftersales
 * @property string $store_free_time
 * @property int $store_manager_id
 * @property string $qr_code
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rStore extends Eloquent
{
	protected $table = '7r_store';
	protected $primaryKey = 'store_id';

	protected $casts = [
		'company_id' => 'int',
		'reg_id' => 'int',
		'store_recommend' => 'int',
		'store_state' => 'bool',
		'store_sort' => 'int',
		'store_collect' => 'int',
		'store_sales' => 'int',
		'store_manager_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'company_id',
		'reg_id',
		'store_name',
		'area_info',
		'lon_lati',
		'store_address',
		'store_zip',
		'store_recommend',
		'store_state',
		'store_close_info',
		'store_sort',
		'store_photo',
		'store_time',
		'store_end_time',
		'store_keywords',
		'store_description',
		'store_phone',
		'store_theme',
		'store_collect',
		'store_slide',
		'good_comment',
		'store_sales',
		'store_presales',
		'store_aftersales',
		'store_free_time',
		'store_manager_id',
		'qr_code'
	];
}
