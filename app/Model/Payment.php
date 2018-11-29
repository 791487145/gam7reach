<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 05:44:34 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\Payment
 *
 * @property int $payment_id 支付索引id
 * @property string $payment_code 支付代码名称
 * @property string $payment_name 支付名称
 * @property string|null $payment_config 支付接口配置信息(序列化信息)
 * @property string $payment_state 接口状态0禁用1启用
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment wherePaymentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment wherePaymentConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment wherePaymentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Payment wherePaymentState($value)
 * @mixin \Eloquent
 */
class Payment extends Eloquent
{
	protected $table = '7r_payment';
	protected $primaryKey = 'payment_id';
	public $timestamps = false;

	protected $fillable = [
		'payment_code',
		'payment_name',
		'payment_config',
		'payment_state'
	];
}
