<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

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
class MemberCenterDecoration extends Eloquent
{
	protected $table = '7r_member_center_decoration';
	protected $primaryKey = 'mc_dec_id';
    public $timestamps = true;
    protected $dateFormat = 'U';


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
