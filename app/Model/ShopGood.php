<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use App\Exceptions\OrderUnavailableException;
use App\Http\Controllers\BaiscController;
use Illuminate\Support\Facades\DB;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rShopGood
 *
 * @property int $shop_goods_id
 * @property int $goods_id
 * @property float $goods_shop_price
 * @property float $goods_promotion_price
 * @property int $goods_promotion_type
 * @property int $goods_click
 * @property int $goods_salenum
 * @property string $goods_spec
 * @property int $goods_collect
 * @property int $goods_storage
 * @property int $goods_state
 * @property int $goods_addtime
 * @property int $goods_edittime
 * @property float $goods_freight
 * @property int $goods_commend
 * @property int $evaluation_count
 * @property int $shop_id
 * @property int $company_id
 * @property int $is_points
 * @package App\Models
 * @property-read \App\Model\Goods $goods
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereEvaluationCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsCommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsEdittime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsFreight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsPromotionPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsPromotionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsSalenum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsShopPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsSpec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereGoodsStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereIsPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereShopGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ShopGood whereShopId($value)
 * @mixin \Eloquent
 */
class ShopGood extends Eloquent
{
    protected $table='7r_shop_goods';
	protected $primaryKey = 'shop_goods_id';
	public $timestamps = true;
    protected $dateFormat = 'U';
    const CREATED_AT = 'goods_addtime';
    const UPDATED_AT = 'goods_edittime';

    //good_state
    const GOOD_STATE_DOWN = 0;
    const GOOD_STATE_SALE = 1;
    const GOOD_STATE_SALE_OUT = 2;

	protected $casts = [
		'goods_addtime' => 'date:Y-m-d',
		'goods_edittime' => 'datetime:Y-m-d H:i',
	];

	protected $fillable = [
		'goods_id',
		'goods_shop_price',
		'goods_promotion_price',
		'goods_promotion_type',
		'goods_click',
		'goods_salenum',
		'goods_spec',
		'goods_collect',
		'goods_storage',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_freight',
		'goods_commend',
		'evaluation_count',
		'shop_id',
		'company_id',
		'is_points'
	];
	/*
	 * 查询不是下架的商品
	 */
    public function scopeOnline($query)
    {
        return $query->where('goods_state','<>',0);
    }
    /*
     * 查询推荐商品
     */
    public function scopeCommend($query){
        return $query->where('goods_commend',1);
    }
	/*
	 * 获取状态
	 */
	protected function getGoodsState($key){
	    $state=array(
	        self::GOOD_STATE_DOWN=>'下架',
            self::GOOD_STATE_SALE=>'正常',
            self::GOOD_STATE_SALE_OUT=>'售罄',
        );
	    return $state[$key];
    }
	/*
	 * 商品信息
	 */
	public function goods(){
	    return $this->hasOne(Goods::class,'goods_id','goods_id');
    }
    /*
     * 旗舰店商品列表
     */
    public function getList($request,$company_id){
        $where['company_id']=$company_id;
        $where_other['company_id']=$company_id;
        if($request->input('goods_name')){//商品名筛选
            $where['goods_name']=$request->input('goods_name');
        }
        if($request->input('goods_spuno')){//商品条形码筛选
            $where['goods_spuno']=$request->input('goods_spuno');
        }
        if($request->input('gc_id')){//商品分类
            $where['gc_id']=$request->input('gc_id');
        }
        if($request->input('b_price')&&$request->input('e_price')){//价格区间筛选
            $where_other['goods_shop_price']=array('between',array($request->input('b_price'),$request->input('e_price')));
        }
        if(isset($goods_state)){//商品状态
            $where_other['goods_state']=$goods_state;
        }
        $list=$this->whereHas('goods',function ($query) use ($where){
            $query->where($where);
        })->with(['goods'])->where($where_other)->forPage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
        $list->each(function ($item,$key){
            $item->goods_state=$this->getGoodsState($item->goods_state);
        });
        return $list;
    }
	/*
	 * 添加商品
	 */
	public function add($date){
        DB::transaction(function() use($date){//开启事务
            $this->create($date);
        });
    }
    /*
     * 编辑商品
     */
    public function edit($date){
        if(isset($date['goods_state'])){//如果商品状态为售罄，修改库存为0
            if($date['goods_state']==2){
                $date['goods_storage']=0;
            }

        }
        $this->find($date['shop_goods_id'])->update($date);
    }
    /*
     * 商品详情
     */
    public function info($shop_goods_id){
        $goods_info=$this->getGoodsinfo($shop_goods_id);
        $result=array();
        $result['goods_info']=$goods_info;
        if($goods_info){
            $goods_info->increment('goods_click',1);
        }
        return $result;
    }
    //查看库存是否足够
    public function decreaseStock($amount)
    {
        if ($amount < 0) {
            throw new OrderUnavailableException('减库存不可小于0');
        }

        return $this->newQuery()->where('shop_goods_id', $this->id)->where('goods_storage', '>=', $amount)->decrement('goods_storage', $amount);
    }
    private function getGoodsinfo($shop_goods_id){
        //后期加缓存
        $goods_info=$this->with(['goods'=>function($query){
            //获取商品图片组
            $query->with('goods_images')->select(['goods_id','goods_spuno','goods_name',
                'goods_jingle','goods_marketprice','goods_serial','goods_image','goods_body']);
        }])->where('shop_goods_id',$shop_goods_id)->select(['shop_goods_id','goods_id','goods_shop_price',
            'goods_promotion_price','goods_promotion_type','goods_click','goods_salenum','goods_spec'
            ,'goods_collect','goods_storage','goods_state','goods_freight','goods_commend','evaluation_count','is_points'])
            ->Online()->first();
        return $goods_info;
    }
}
