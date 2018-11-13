<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPayment
 * 
 * @property int $payment_id
 * @property string $payment_code
 * @property string $payment_name
 * @property string $payment_config
 * @property string $payment_state
 *
 * @package App\Models
 */
class 7rPayment extends Eloquent
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
