<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPdRecharge
 * 
 * @property int $pdr_id
 * @property int $pdr_sn
 * @property int $pdr_company_id
 * @property string $pdr_company_name
 * @property float $pdr_amount
 * @property string $pdr_payment_code
 * @property string $pdr_payment_name
 * @property string $pdr_trade_sn
 * @property int $pdr_add_time
 * @property string $pdr_payment_state
 * @property int $pdr_payment_time
 * @property string $pdr_admin
 *
 * @package App\Models
 */
class 7rPdRecharge extends Eloquent
{
	protected $table = '7r_pd_recharge';
	protected $primaryKey = 'pdr_id';
	public $timestamps = false;

	protected $casts = [
		'pdr_sn' => 'int',
		'pdr_company_id' => 'int',
		'pdr_amount' => 'float',
		'pdr_add_time' => 'int',
		'pdr_payment_time' => 'int'
	];

	protected $fillable = [
		'pdr_sn',
		'pdr_company_id',
		'pdr_company_name',
		'pdr_amount',
		'pdr_payment_code',
		'pdr_payment_name',
		'pdr_trade_sn',
		'pdr_add_time',
		'pdr_payment_state',
		'pdr_payment_time',
		'pdr_admin'
	];
}
