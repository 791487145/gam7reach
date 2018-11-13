<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCompanyExtend
 * 
 * @property int $company_id
 * @property string $upload_setting
 * @property int $member_decoration_switch
 *
 * @package App\Models
 */
class 7rCompanyExtend extends Eloquent
{
	protected $table = '7r_company_extend';
	protected $primaryKey = 'company_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'member_decoration_switch' => 'int'
	];

	protected $fillable = [
		'upload_setting',
		'member_decoration_switch'
	];
}
