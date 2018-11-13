<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rEmployLog
 * 
 * @property int $id
 * @property string $content
 * @property int $created_at
 * @property string $employ_name
 * @property string $ip
 * @property int $company_id
 *
 * @package App\Models
 */
class 7rEmployLog extends Eloquent
{
	protected $table = '7r_employ_log';
	public $timestamps = false;

	protected $casts = [
		'created_at' => 'int',
		'company_id' => 'int'
	];

	protected $fillable = [
		'content',
		'employ_name',
		'ip',
		'company_id'
	];
}
