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
 * @property int $created_at
 * @property int $updated_at
 * @package App\Models
 * @property int $company_id 企业id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup whereGoodsGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup whereGoodsGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GoodsGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodsGroup extends Eloquent
{
	protected $table = '7r_goods_group';
	protected $primaryKey = 'goods_group_id';
    public $timestamps = true;
    protected $dateFormat = 'U';
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
