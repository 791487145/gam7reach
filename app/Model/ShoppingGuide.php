<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use App\Http\Controllers\BaiscController;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\ShoppingGuide
 *
 * @property int $sg_id 导购id
 * @property string|null $sg_name 姓名
 * @property string $password 密码
 * @property string|null $sg_nickname 昵称
 * @property string $sg_mobile 手机号
 * @property string|null $work_no 工号
 * @property int|null $company_id 企业id
 * @property int|null $store_id 所属门店
 * @property int|null $sex 1:男0女
 * @property int|null $status 1正常；2禁止
 * @property string|null $sg_wxopenid 微信openid
 * @property string|null $signature 签名
 * @property string|null $sg_avatar 导购头像
 * @property int|null $fans_num 粉丝数量
 * @property int|null $member_num 会员数量
 * @property float|null $sales_total 销售额
 * @property string|null $qr_code 二维码
 * @property int|null $created_at
 * @property int|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereFansNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereMemberNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereQrCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSalesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSgWxopenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShoppingGuide whereWorkNo($value)
 * @mixin \Eloquent
 */
class ShoppingGuide extends Eloquent
{
	protected $table = '7r_shopping_guide';
	protected $primaryKey = 'sg_id';

	//sex
	const SEX_BOY = 1;
	const SEX_GIRL = 2;
	//status
	const STATUS_NORMAL = 1;
	const STATUS_FORBBIN = 2;

	protected $casts = [
		'company_id' => 'int',
		'store_id' => 'int',
		'sex' => 'int',
		'status' => 'int',
		'fans_num' => 'int',
		'member_num' => 'int',
		'sales_total' => 'float',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'sg_name',
		'password',
		'sg_nickname',
		'sg_mobile',
		'work_no',
		'company_id',
		'store_id',
		'sex',
		'status',
		'sg_wxopenid',
		'signature',
		'sg_avatar',
		'fans_num',
		'member_num',
		'sales_total',
		'qr_code'
	];

    /**
     * 补充
     * @param $shoppingGuide
     * @return mixed
     */
    static function shopGuideCN($shoppingGuide)
    {
        foreach ($shoppingGuide as $shopGuide){
            $shopGuide->sex_name = $shopGuide->sex == self::SEX_BOY ? '男' : '女';
            $shopGuide->role_name = '店员';
            $shopGuide->store_name = Store::whereStoreId($shopGuide->store_id)->value('store_name');
            $shopGuide->status_name = $shopGuide->status == self::STATUS_NORMAL ? '在职' : '离职';
        }

        return $shoppingGuide;
    }

    public function store()
    {
        return $this->hasOne(Store::class,'store_id','store_id');
    }
}
