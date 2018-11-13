<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Model;

use App\Http\Controllers\BaiscController;
use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;
/**
 * Class 7rGood
 * 
 * @property int $goods_id
 * @property string $goods_spuno
 * @property string $goods_name
 * @property int $goods_group_id
 * @property string $goods_jingle
 * @property int $company_id
 * @property int $gc_id
 * @property float $goods_price
 * @property float $goods_marketprice
 * @property string $goods_serial
 * @property string $goods_image
 * @property int $goods_state
 * @property int $goods_addtime
 * @property int $goods_edittime
 * @property string $goods_body
 *
 * @package App\Models
 */
class Goods extends Eloquent
{

    protected $table="7r_goods";
	protected $primaryKey = 'goods_id';
	public $timestamps = true;
    protected $dateFormat = 'U';
    const CREATED_AT = 'goods_addtime';
    const UPDATED_AT = 'goods_edittime';

	protected $casts = [
		'goods_group_id' => 'int',
		'company_id' => 'int',
		'gc_id' => 'int',
		'goods_price' => 'float',
		'goods_marketprice' => 'float',
		'goods_state' => 'int',
		'goods_addtime' => 'int',
		'goods_edittime' => 'int'
	];

	protected $fillable = [
		'goods_spuno',
		'goods_name',
		'goods_group_id',
		'goods_jingle',
		'company_id',
		'gc_id',
		'goods_price',
		'goods_marketprice',
		'goods_serial',
		'goods_image',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_body'
	];
	/*
	 * 商品分组
	 */
    public function goods_group(){
        return $this->hasOne(GoodsGroup::class,'goods_group_id','goods_group_id');
    }
    /*
     * 获取商品池列表
     */
    public function getList($request){
        $where['company_id']=1;
        $goods_state=$request->input('goods_state');
        if($request->input('goods_name')){//商品名筛选
            $where['goods_name']=$request->input('goods_name');
        }
        if($request->input('goods_spuno')){//商品条形码筛选
            $where['goods_spuno']=$request->input('goods_spuno');
        }
        if($request->input('b_price')&&$request->input('e_price')){//价格区间筛选
            $where['goods_price']=array('between',array($request->input('b_price'),$request->input('e_price')));
        }
        if(isset($goods_state)){//商品状态
            $where['goods_state']=$goods_state;
        }
        if($request->input('gc_id')){//商品分类
            $where['gc_id']=$request->input('gc_id');
        }
        return $this->with('goods_group')->where($where)->forPage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
    }

}
