<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPdCash
 * 
 * @property int $pdc_id
 * @property int $pdc_sn
 * @property int $pdc_company_id
 * @property string $pdc_company_name
 * @property float $pdc_amount
 * @property string $pdc_bank_name
 * @property string $pdc_bank_no
 * @property string $pdc_bank_user
 * @property int $pdc_add_time
 * @property int $pdc_payment_time
 * @property string $pdc_payment_state
 * @property string $pdc_payment_admin
 *
 * @package App\Models
 */
class 7rPdCash extends Eloquent
{
	protected $table = '7r_pd_cash';
	protected $primaryKey = 'pdc_id';
	public $timestamps = false;

	protected $casts = [
		'pdc_sn' => 'int',
		'pdc_company_id' => 'int',
		'pdc_amount' => 'float',
		'pdc_add_time' => 'int',
		'pdc_payment_time' => 'int'
	];

	protected $fillable = [
		'pdc_sn',
		'pdc_company_id',
		'pdc_company_name',
		'pdc_amount',
		'pdc_bank_name',
		'pdc_bank_no',
		'pdc_bank_user',
		'pdc_add_time',
		'pdc_payment_time',
		'pdc_payment_state',
		'pdc_payment_admin'
	];
}
