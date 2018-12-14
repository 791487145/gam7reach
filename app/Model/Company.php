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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereAreaInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereAutoDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereCloseInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereMainCertification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereModuleInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereOrderOvertime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereShowStoreWebIm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereSmsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereStoreDecorationSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereStorePriceSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereTelphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Company whereUpdatedAt($value)
 * @mixin \Eloquent
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
