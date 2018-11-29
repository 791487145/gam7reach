<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCompanyService
 * 
 * @property int $id
 * @property int $company_id
 * @property int $service_type
 * @property int $service_state
 * @property int $service_time
 *
 * @package App\Models
 */
class CompanyService extends Eloquent
{
	protected $table = '7r_company_service';
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
