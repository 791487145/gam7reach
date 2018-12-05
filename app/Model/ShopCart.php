<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 03 Dec 2018 09:03:33 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\ShopCart
 *
 * @property int $cart_id 购物车id
 * @property int $buyer_id 买家id
 * @property int $shop_id 旗舰店id
 * @property string $shop_name 旗舰店店名称
 * @property int $goods_id 商品id
 * @property string $goods_name 商品名称
 * @property float $goods_price 商品价格
 * @property int $goods_num 购买商品数量
 * @property string $goods_image 商品图片
 * @property int $bl_id 组合套装ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereBlId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereGoodsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereGoodsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopCart whereShopName($value)
 * @mixin \Eloquent
 */
class ShopCart extends Eloquent
{
	protected $table = '7r_shop_cart';
	protected $primaryKey = 'cart_id';
	public $timestamps = false;

	protected $casts = [
		'buyer_id' => 'int',
		'shop_id' => 'int',
		'goods_id' => 'int',
		'goods_price' => 'float',
		'goods_num' => 'int',
		'bl_id' => 'int'
	];

	protected $fillable = [
		'buyer_id',
		'shop_id',
		'shop_name',
		'goods_id',
		'goods_name',
		'goods_price',
		'goods_num',
		'goods_image',
		'bl_id'
	];

    /**
     * 列表
     * @return ShopCart[]|\Illuminate\Database\Eloquent\Collection
     */
	public function cartList()
    {
        $carts = $this->get();
        //TODO 组合
        return $carts;
    }

}
