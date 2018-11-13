<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCoPayment
 * 
 * @property int $id
 * @property int $company_id
 * @property int $payment
 * @property string $payment_config
 * @property int $payment_state
 *
 * @package App\Models
 */
class 7rCoPayment extends Eloquent
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
}
