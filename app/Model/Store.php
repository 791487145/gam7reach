<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Store
 *
 * @property int $store_id 店铺索引id
 * @property int $company_id 企业id
 * @property int|null $reg_id 区域id
 * @property string $store_name 店铺名称
 * @property string $area_info 地区内容，冗余数据
 * @property string|null $lon_lati 经纬度
 * @property string $store_address 详细地区
 * @property string $store_zip 店铺编码
 * @property int $store_recommend 推荐，0为否，1为是，默认为0
 * @property bool $store_state 店铺状态，0关闭，1开启，
 * @property string|null $store_close_info 店铺关闭原因
 * @property int $store_sort 店铺排序
 * @property string|null $store_photo 门店照片
 * @property string $store_time 店铺时间
 * @property string $store_end_time 店铺关闭时间
 * @property string $store_keywords 店铺seo关键字
 * @property string $store_description 店铺seo描述
 * @property string|null $store_phone 商家电话
 * @property string $store_theme 店铺当前主题
 * @property int $store_collect 店铺收藏数量
 * @property string|null $store_slide 店铺幻灯片
 * @property string|null $good_comment 好评率
 * @property int $store_sales 店铺销量
 * @property string|null $store_presales 售前客服
 * @property string|null $store_aftersales 售后客服
 * @property string|null $store_free_time 商家配送时间
 * @property int $store_manager_id 店长id
 * @property string|null $qr_code 二维码
 * @property int|null $created_at
 * @property int|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereAreaInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereGoodComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereLonLati($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereQrCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereRegId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreAftersales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreCloseInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreFreeTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStorePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStorePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStorePresales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreRecommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereStoreZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Store whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Model\Employ $empoly
 * @property-read \App\Model\RegisionManager $regision_manage
 */
class Store extends Eloquent
{
	protected $table = '7r_store';
	protected $primaryKey = 'store_id';
	protected $dateFormat = 'U';
	//store_state
	const STORE_STATE_OPEN = 1;
	const STORE_STATE_CLOSE = 0;

	protected $casts = [
		'company_id' => 'int',
		'reg_id' => 'int',
		'store_recommend' => 'int',
		'store_state' => 'int',
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

    /**
     * 状态值
     * @param $status
     * @return mixed
     */
	static function stateCN($status)
    {
        $param = array(
            self::STORE_STATE_CLOSE => '关闭',
            self::STORE_STATE_OPEN => '开店'
        );
        return $param[$status];
    }

    static function addressCN($address)
    {
        $address = json_decode($address,true);
        $province = Area::whereAreaId($address['province'])->value('area_name');
        $city = Area::whereAreaId($address['city'])->value('area_name');
        $area = Area::whereAreaId($address['area'])->value('area_name');
        //dd($province);
        return $province.$city.$area;
    }

    public function regision_manage()
    {
        return $this->hasOne(RegisionManager::class,'id','reg_id');
    }

    public function empoly()
    {
        return $this->hasOne(Employ::class,'id','store_manager_id');
    }
}
