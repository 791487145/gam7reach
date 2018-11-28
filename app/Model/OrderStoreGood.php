<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\OrderStoreGood
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood query()
 * @mixin \Eloquent
 * @property int $rec_id 订单商品表索引id
 * @property int $order_id 订单id
 * @property int $store_goods_id 云店商品id
 * @property string $goods_name 商品名称
 * @property float $goods_price 商品价格
 * @property int $goods_num 商品数量
 * @property string|null $goods_image 商品图片
 * @property float $goods_pay_price 商品实际成交价
 * @property int $store_id 云店ID
 * @property int $buyer_id 买家ID
 * @property string $goods_type 1默认2团购商品3限时折扣商品4组合套装5赠品
 * @property int $promotions_id 促销活动ID（团购ID/限时折扣ID/优惠套装ID）与goods_type搭配使用
 * @property int $gc_id 商品分类ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsPayPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereGoodsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood wherePromotionsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereRecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereStoreGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderStoreGood whereStoreId($value)
 */
class OrderStoreGood extends Eloquent
{
    protected $table = '7r_order_store_goods';
	protected $primaryKey = 'rec_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'store_goods_id' => 'int',
		'goods_price' => 'float',
		'goods_num' => 'int',
		'goods_pay_price' => 'float',
		'store_id' => 'int',
		'buyer_id' => 'int',
		'promotions_id' => 'int',
		'gc_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'store_goods_id',
		'goods_name',
		'goods_price',
		'goods_num',
		'goods_image',
		'goods_pay_price',
		'store_id',
		'buyer_id',
		'goods_type',
		'promotions_id',
		'gc_id'
	];
}
