<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 05:44:34 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\CoPayment
 *
 * @property int $id 主键id
 * @property int $company_id 企业id
 * @property int $payment 支付方式id
 * @property string $payment_config 支付接口配置信息(序列化信息)
 * @property int $payment_state 接口状态0禁用1启用
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment wherePaymentConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\CoPayment wherePaymentState($value)
 * @mixin \Eloquent
 */
class CoPayment extends Eloquent
{
	protected $table = '7r_co_payment';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'payment' => 'int',
		'payment_state' => 'int'
	];

	protected $fillable = [
		'company_id',
		'payment',
		'payment_config',
		'payment_state'
	];

	public function payment()
    {
        return $this->hasOne(Payment::class,'payment_id','payment');
    }
}
