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
        //默认为分组第一个id
//        $goods_group_id=$request->input('goods_group_id',$goods_group->first()->goods_group_id);
//        //分组下的商品
//        $shop_goods=ShopGood::whereHas('goods',function ($query) use ($goods_group_id){
//            $query->where('goods_group_id',$goods_group_id);
//        })->with(['goods'=>function($query){
//            $query->select(['goods_id','goods_name','goods_jingle','goods_marketprice','goods_image']);
//        }])->Online()->forpage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
    }
}