<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rStoreMsg
 * 
 * @property int $sm_id
 * @property int $company_id
 * @property int $store_id
 * @property string $sm_content
 * @property int $sm_addtime
 *
 * @package App\Models
 */
class 7rStoreMsg extends Eloquent
{
	protected $table = '7r_store_msg';
	protected $primaryKey = 'sm_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'store_id' => 'int',
		'sm_addtime' => 'int'
	];

	protected $fillable = [
		'company_id',
		'store_id',
		'sm_content',
		'sm_addtime'
	];
}
