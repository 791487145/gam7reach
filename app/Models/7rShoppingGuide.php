<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rShoppingGuide
 * 
 * @property int $sg_id
 * @property string $sg_name
 * @property string $password
 * @property string $sg_nickname
 * @property string $sg_mobile
 * @property string $work_no
 * @property int $company_id
 * @property int $store_id
 * @property int $sex
 * @property int $status
 * @property string $sg_wxopenid
 * @property string $signature
 * @property string $sg_avatar
 * @property int $fans_num
 * @property int $member_num
 * @property float $sales_total
 * @property string $qr_code
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rShoppingGuide extends Eloquent
{
	protected $table = '7r_shopping_guide';
	protected $primaryKey = 'sg_id';

	protected $casts = [
		'company_id' => 'int',
		'store_id' => 'int',
		'sex' => 'int',
		'status' => 'int',
		'fans_num' => 'int',
		'member_num' => 'int',
		'sales_total' => 'float',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'sg_name',
		'password',
		'sg_nickname',
		'sg_mobile',
		'work_no',
		'company_id',
		'store_id',
		'sex',
		'status',
		'sg_wxopenid',
		'signature',
		'sg_avatar',
		'fans_num',
		'member_num',
		'sales_total',
		'qr_code'
	];
}
