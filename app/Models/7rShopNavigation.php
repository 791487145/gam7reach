<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rShopNavigation
 * 
 * @property int $sn_id
 * @property string $sn_title
 * @property int $sn_shop_id
 * @property string $sn_content
 * @property string $sn_url
 * @property int $sn_parent_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class 7rShopNavigation extends Eloquent
{
	protected $table = '7r_shop_navigation';
	protected $primaryKey = 'sn_id';

	protected $casts = [
		'sn_shop_id' => 'int',
		'sn_parent_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'sn_title',
		'sn_shop_id',
		'sn_content',
		'sn_url',
		'sn_parent_id'
	];
}
