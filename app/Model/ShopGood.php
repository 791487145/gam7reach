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
 *
 * @package App\Models
 */
class ShopGood extends Eloquent
{
    protected $table='7r_shop_goods';
	protected $primaryKey = 'shop_goods_id';
	public $timestamps = true;
    protected $dateFormat = 'U';
    const CREATED_AT = 'goods_addtime';
    const UPDATED_AT = 'goods_edittime';

	protected $casts = [
		'goods_id' => 'int',
		'goods_shop_price' => 'float',
		'goods_promotion_price' => 'float',
		'goods_promotion_type' => 'int',
		'goods_click' => 'int',
		'goods_salenum' => 'int',
		'goods_collect' => 'int',
		'goods_storage' => 'int',
		'goods_state' => 'int',
		'goods_addtime' => 'int',
		'goods_edittime' => 'int',
		'goods_freight' => 'float',
		'goods_commend' => 'int',
		'evaluation_count' => 'int',
		'shop_id' => 'int',
		'company_id' => 'int',
		'is_points' => 'int'
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
        $list=$this->with(['goods'=>function($query) use($where){
            $query->where($where);
        }])->where($where_other)->forPage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get()->toArray();
        $goods_list=array();
        foreach ($list as  $key=>$goods){
            $goods_list[$key]=$goods;
            $goods_list[$key]['goods_name']=$goods['goods']['goods_name'];
            $goods_list[$key]['goods_spuno']=$goods['goods']['goods_spuno'];
            $goods_list[$key]['goods_group_id']=$goods['goods']['goods_group_id'];
            $goods_list[$key]['goods_image']=$goods['goods']['goods_image'];
            if($goods['goods_state']==1){
                $goods_list[$key]['goods_state']='上架';
            }elseif($goods['goods_state']==2){
                $goods_list[$key]['goods_state']='售罄';
            }else{
                $goods_list[$key]['goods_state']='下架';
            }
            $goods_list[$key]['goods_addtime']=date('Y-m-d H:i:s',$goods['goods_addtime']);
            $goods_list[$key]['goods_edittime']=date('Y-m-d H:i:s',$goods['goods_edittime']);
            unset($goods_list[$key]['goods']);
        }
        return $goods_list;
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
        $this->find($date['shop_goods_id'])->update($date);
    }
}
