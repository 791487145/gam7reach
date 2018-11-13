<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rEvaluateGood
 * 
 * @property int $geval_id
 * @property int $company_id
 * @property int $store_id
 * @property string $store_name
 * @property int $shop_id
 * @property string $shop_name
 * @property int $geval_orderid
 * @property int $geval_orderno
 * @property int $geval_store_goodsid
 * @property int $geval_shop_goodsid
 * @property string $geval_goodsname
 * @property string $geval_goodsimage
 * @property bool $geval_scores
 * @property string $geval_content
 * @property bool $geval_isanonymous
 * @property int $geval_addtime
 * @property int $geval_frommemberid
 * @property string $geval_frommembername
 * @property string $geval_image
 *
 * @package App\Models
 */
class 7rEvaluateGood extends Eloquent
{
	protected $primaryKey = 'geval_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'store_id' => 'int',
		'shop_id' => 'int',
		'geval_orderid' => 'int',
		'geval_orderno' => 'int',
		'geval_store_goodsid' => 'int',
		'geval_shop_goodsid' => 'int',
		'geval_scores' => 'bool',
		'geval_isanonymous' => 'bool',
		'geval_addtime' => 'int',
		'geval_frommemberid' => 'int'
	];

	protected $fillable = [
		'company_id',
		'store_id',
		'store_name',
		'shop_id',
		'shop_name',
		'geval_orderid',
		'geval_orderno',
		'geval_store_goodsid',
		'geval_shop_goodsid',
		'geval_goodsname',
		'geval_goodsimage',
		'geval_scores',
		'geval_content',
		'geval_isanonymous',
		'geval_addtime',
		'geval_frommemberid',
		'geval_frommembername',
		'geval_image'
	];
}
