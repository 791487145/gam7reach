<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCompany
 * 
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property float $balance
 * @property int $sms_num
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property string $close_info
 * @property int $main_certification
 * @property string $area_info
 * @property string $company_address
 * @property string $logo
 * @property string $telphone
 * @property string $seo
 * @property string $module_info
 * @property int $show_store_web_im
 * @property int $store_decoration_switch
 * @property int $store_price_switch
 * @property int $order_overtime
 * @property int $auto_delivery
 *
 * @package App\Models
 */
class Company extends Eloquent
{
	protected $table = '7r_company';
    public $timestamps = true;
    protected $dateFormat = 'U';
	protected $casts = [
		'category_id' => 'int',
		'balance' => 'float',
		'sms_num' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int',
		'status' => 'int',
		'main_certification' => 'int',
		'show_store_web_im' => 'int',
		'store_decoration_switch' => 'int',
		'store_price_switch' => 'int',
		'order_overtime' => 'int',
		'auto_delivery' => 'int'
	];

	protected $fillable = [
		'name',
		'category_id',
		'balance',
		'sms_num',
		'status',
		'close_info',
		'main_certification',
		'area_info',
		'company_address',
		'logo',
		'telphone',
		'seo',
		'module_info',
		'show_store_web_im',
		'store_decoration_switch',
		'store_price_switch',
		'order_overtime',
		'auto_delivery'
	];
}
