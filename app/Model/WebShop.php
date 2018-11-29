<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rWebShop
 *
 * @property int $shop_id
 * @property int $company_id
 * @property int $reg_id
 * @property string $shop_name
 * @property string $area_info
 * @property string $lon_lati
 * @property string $shop_address
 * @property string $shop_zip
 * @property int $shop_recommend
 * @property bool $shop_state
 * @property string $shop_close_info
 * @property string $shop_time
 * @property string $shop_end_time
 * @property string $shop_keywords
 * @property string $shop_description
 * @property string $shop_phone
 * @property string $shop_theme
 * @property int $shop_collect
 * @property string $shop_slide
 * @property string $good_comment
 * @property int $shop_sales
 * @property string $shop_presales
 * @property string $shop_aftersales
 * @property string $shop_free_time
 * @property int $created_at
 * @property int $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereAreaInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereGoodComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereLonLati($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereRegId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopAftersales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopCloseInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopFreeTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopPresales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopRecommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereShopZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WebShop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WebShop extends Eloquent
{
	protected $table = '7r_web_shop';
	protected $primaryKey = 'shop_id';
    public $timestamps = true;
    protected $dateFormat = 'U';
	protected $casts = [
		'company_id' => 'int',
		'reg_id' => 'int',
		'shop_recommend' => 'int',
		'shop_collect' => 'int',
		'shop_sales' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'company_id',
		'reg_id',
		'shop_name',
		'area_info',
		'lon_lati',
		'shop_address',
		'shop_zip',
		'shop_recommend',
		'shop_state',
		'shop_close_info',
		'shop_time',
		'shop_end_time',
		'shop_keywords',
		'shop_description',
		'shop_phone',
		'shop_theme',
		'shop_collect',
		'shop_slide',
		'good_comment',
		'shop_sales',
		'shop_presales',
		'shop_aftersales',
		'shop_free_time'
	];
}
