<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\CompanyService
 *
 * @property int $id 主键id
 * @property int $company_id 企业id
 * @property int $service_type 企业服务类型 1满即送；2限时折扣；3优惠券
 * @property int $service_state 服务状态 0过期 ；1正常
 * @property int $service_time 服务订购时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService whereServiceState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService whereServiceTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CompanyService whereServiceType($value)
 * @mixin \Eloquent
 */
class CompanyService extends Eloquent
{
	protected $table = '7r_company_service';
    protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'service_type' => 'int',
		'service_state' => 'int',
		'service_time' => 'int'
	];

	protected $fillable = [
		'company_id',
		'service_type',
		'service_state',
		'service_time'
	];
}
