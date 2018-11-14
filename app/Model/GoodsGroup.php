<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGoodsGroup
 * 
 * @property int $goods_group_id
 * @property string $goods_group_name
 * @property int $company_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class GoodsGroup extends Eloquent
{
	protected $table = '7r_goods_group';
	protected $primaryKey = 'goods_group_id';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $company_id=1;
	protected $casts = [
		'company_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'goods_group_name',
		'company_id'
	];
}
