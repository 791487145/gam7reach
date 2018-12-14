<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 03 Dec 2018 09:03:33 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\CompanyExtend
 *
 * @property int $company_id 企业ID
 * @property string|null $upload_setting 企业上传配置信息（序列化或json）
 * @property int $member_decoration_switch 会员装修开关 0关闭；1开启
 * @property string|null $sign_name 企业短信签名
 * @property string|null $appid 微信APPid
 * @property string|null $secret 微信秘钥
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereAppid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereMemberDecorationSwitch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereSignName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyExtend whereUploadSetting($value)
 * @mixin \Eloquent
 */
class CompanyExtend extends Eloquent
{
	protected $table = '7r_company_extend';
	protected $primaryKey = 'company_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'member_decoration_switch' => 'int'
	];

	protected $hidden = [
		'secret'
	];

	protected $fillable = [
		'upload_setting',
		'member_decoration_switch',
		'sign_name',
		'appid',
		'secret'
	];
}
