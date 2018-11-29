<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

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
class CompanyExtend extends Eloquent
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
	    'company_id',
		'upload_setting',
		'member_decoration_switch',
        'sign_name',
	];
}
