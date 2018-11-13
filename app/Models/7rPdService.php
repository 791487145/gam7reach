<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rPdService
 * 
 * @property int $pds_id
 * @property int $pds_sn
 * @property int $pds_company_id
 * @property string $pds_company_name
 * @property int $pds_service_type
 * @property float $pds_amount
 * @property string $pds_payment_code
 * @property string $pds_payment_name
 * @property string $pds_trade_sn
 * @property int $pds_add_time
 * @property string $pds_payment_state
 * @property int $pds_payment_time
 * @property string $pds_employ
 * @property int $pds_state
 * @property string $admin_name
 *
 * @package App\Models
 */
class 7rPdService extends Eloquent
{
	protected $table = '7r_pd_service';
	protected $primaryKey = 'pds_id';
	public $timestamps = false;

	protected $casts = [
		'pds_sn' => 'int',
		'pds_company_id' => 'int',
		'pds_service_type' => 'int',
		'pds_amount' => 'float',
		'pds_add_time' => 'int',
		'pds_payment_time' => 'int',
		'pds_state' => 'int'
	];

	protected $fillable = [
		'pds_sn',
		'pds_company_id',
		'pds_company_name',
		'pds_service_type',
		'pds_amount',
		'pds_payment_code',
		'pds_payment_name',
		'pds_trade_sn',
		'pds_add_time',
		'pds_payment_state',
		'pds_payment_time',
		'pds_employ',
		'pds_state',
		'admin_name'
	];
}
