<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMemberCenterDecoration
 * 
 * @property int $mc_dec_id
 * @property int $company_id
 * @property string $bg_img
 * @property int $level_enable
 * @property int $qr_code_enable
 * @property string $moudle_enable
 * @property int $rights_enable
 * @property int $page_style
 * @property string $element_setting
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rMemberCenterDecoration extends Eloquent
{
	protected $table = '7r_member_center_decoration';
	protected $primaryKey = 'mc_dec_id';

	protected $casts = [
		'company_id' => 'int',
		'level_enable' => 'int',
		'qr_code_enable' => 'int',
		'rights_enable' => 'int',
		'page_style' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'company_id',
		'bg_img',
		'level_enable',
		'qr_code_enable',
		'moudle_enable',
		'rights_enable',
		'page_style',
		'element_setting'
	];
}
