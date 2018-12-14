<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use App\Http\Controllers\BaiscController;
use Illuminate\Support\Facades\DB;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rStoreGood
 *
 * @property int $store_goods_id
 * @property int $goods_id
 * @property float $goods_store_price
 * @property float $goods_promotion_price
 * @property int $goods_promotion_type
 * @property int $goods_click
 * @property int $goods_salenum
 * @property int $goods_collect
 * @property int $goods_storage
 * @property string $goods_spec
 * @property int $goods_state
 * @property int $goods_addtime
 * @property int $goods_edittime
 * @property float $goods_freight
 * @property int $goods_commend
 * @property int $evaluation_count
 * @property int $store_id
 * @property int $company_id
 * @property int $is_points
 * @package App\Models
 * @property-read \App\Model\Goods $goods
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereEvaluationCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsCommend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsEdittime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsFreight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsPromotionPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsPromotionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsSalenum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsSpec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsStorage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereGoodsStorePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereIsPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereStoreGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\StoreGood whereStoreId($value)
 * @mixin \Eloquent
 */
class StoreGood extends Eloquent
{
    protected $table='7r_store_goods';
	protected $primaryKey = 'store_goods_id';
	public $timestamps = true;
    protected $dateFormat = 'U';
    const CREATED_AT = 'goods_addtime';
    const UPDATED_AT = 'goods_edittime';

	protected $casts = [
        'goods_addtime' => 'date:Y-m-d',
        'goods_edittime' => 'datetime:Y-m-d H:i',
	];

	protected $fillable = [
		'goods_id',
		'goods_store_price',
		'goods_promotion_price',
		'goods_promotion_type',
		'goods_click',
		'goods_salenum',
		'goods_collect',
		'goods_storage',
		'goods_spec',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_freight',
		'goods_commend',
		'evaluation_count',
		'store_id',
		'company_id',
		'is_points'
	];
    /*
     * 获取状态
     */
    protected function getGoodsState($key){
        $state=array(
            '0'=>'下架',
            '1'=>'正常',
            '2'=>'售罄',
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
     * 云店商品列表
     */
    public function getList($request,$company_id){

        $where['company_id']=$company_id;
        $where_other['store_id']=$request->input('store_id');
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
            $where_other['goods_store_price']=array('between',array($request->input('b_price'),$request->input('e_price')));
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
        if($date['goods_state']==2){//如果商品状态为售罄，修改库存为0
            $date['goods_storage']=0;
        }
        $this->find($date['store_goods_id'])->update($date);
    }
}
