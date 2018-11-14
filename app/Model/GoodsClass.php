<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rGoodsClass
 * 
 * @property int $gc_id
 * @property string $gc_name
 * @property int $gc_parent_id
 * @property bool $gc_sort
 * @property int $company_id
 *
 * @package App\Models
 */
class GoodsClass extends Eloquent
{
	protected $table = '7r_goods_class';
	protected $primaryKey = 'gc_id';
	public $timestamps = false;

	protected $casts = [
		'gc_parent_id' => 'int',
		'gc_sort' => 'bool',
	];

	protected $fillable = [
		'gc_name',
		'gc_parent_id',
		'gc_sort',
	];
}
