<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/6
 * Time: 9:37 AM
 */
namespace App\Modules\Shop\Http\Controllers\Goods;
use App\Http\Controllers\BaiscController;
use App\Http\Controllers\ShopBascController;
use App\Model\GoodsGroup;
use App\Model\ShopGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends ShopBascController{
    /*
     * 商品分组列表
     */
    public function groupList(Request $request){
        $goods_group=GoodsGroup::where('company_id',$this->company_id)->get();
        $data['goods_group_list']=$goods_group;
        return $this->success($data);
    }
    //获取分组下的商品
    public function getGroupGoods(Request $request){
        $where=[];
        $b_price=$request->input('b_price');//价格区间
        $e_price=$request->input('e_price');//价格区间
        $goods_name=$request->input('goods_name');
        if($goods_name){
            $where_other['goods_name']=$goods_name;
        }
        if($b_price&&$e_price){
            $where['goods_shop_price']=['between',array($b_price,$e_price)];
        }
        $goods_group=GoodsGroup::where('company_id',$this->company_id)->first();
        //默认为分组第一个id
        $goods_group_id=$request->input('goods_group_id',$goods_group->goods_group_id);
        $where_other['goods_group_id']=$goods_group_id;
        //分组下的商品
        $shop_goods=ShopGood::whereHas('goods',function ($query) use ($where_other){
            $query->where($where_other);
        })->with(['goods'=>function($query){
            $query->select(['goods_id','goods_name','goods_jingle','goods_marketprice','goods_image']);
        }])->Online()->where($where)->forpage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
        return $this->success($shop_goods);
    }
    //商品详情
    public function info(Request $request,ShopGood $shopGood){
        $shop_goods_id=$request->input('shop_goods_id');
        if(!$shop_goods_id){
            return $this->failed('旗舰店商品id不能为空');
        }
        $shop_goods_info=$shopGood->info($shop_goods_id);
        return $this->success($shop_goods_info);
    }
}