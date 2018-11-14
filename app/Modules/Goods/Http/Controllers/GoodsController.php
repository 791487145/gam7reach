<?php
/**
 * Created by PhpStorm.
 * User: 23261
 * Date: 2018/11/13
 * Time: 12:58
 */
namespace App\Modules\Goods\Http\Controllers;
use App\Http\Controllers\BaiscController;
use App\Model\Goods;
use App\Models\GoodsClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoodsController extends BaiscController
{


    /*
     * 总商品池
     */
    public function goodsList(Request $request,Goods $goods){
        $goods_list=$goods->getList($request,$this->company_id);
        return $this->success($goods_list);
    }
    /*
     * 商品类目
     */
    public function goodsClass(){
      $tree=GoodsClass::all()->toTree();
      return $this->success($tree);
    }
    /*
     * 添加商品
     */
    public function goodsAdd(Request $request,Goods $goods){
        $message=array(
            'goods_name.required'=>'商品名称不能为空',
            'gc_id.required'=>'商品类目不能为空',
            'goods_price.required'=>'商品价格不能为空',
            'goods_images.required'=>'商品图片不能为空',
            'goods_price.numeric'=>'商品价格必须是数字',

        );
        $validator = Validator::make($request->all(), [
            'goods_name' => 'required',
            'gc_id'=>'required',
            'goods_price'=>'required|numeric',
            'goods_images'=>'required'
        ],$message);
        if ($validator->fails()) {
           return $this->failed($validator->errors());
        }
        $date=$request->all();
        $date['company_id']=$this->company_id;
        $goods->addGoods($date);
        return $this->message('添加商品成功');
    }
    /*
     * 旗舰店添加商品
     */
    public function addShopGoods(){

    }
    /*
     * 云店添加商品
     */
    public function addStoreGoods(){

    }
    /*
     * 编辑商品
     */
    public function editGoods(){

    }
    /*
     * 编辑旗舰店商品
     */
    public function editShopGoods(){

    }
    /*
     * 编辑云店商品
     */
    public function editStoreGoods(){

    }
    /*
     * 批量操作
     */
    public function batch(Request $request,Goods $goods){
        $flag=$request->input('flag');
        $goods_ids=$request->input('goods_id');
        if(is_array($goods_ids)){
            if($flag=='goods_class'){//修改商品分类
                $gc_id=$request->input('gc_id');
                if(empty($gc_id)){
                    return $this->failed('分类id为空');
                }
                $good_list=Goods::whereIn('goods_id',$goods_ids)->select('goods_id','gc_id')->get();
                $good_list->each(function ($item, $key) use($gc_id){
                    $item->gc_id=$gc_id;
                });
                $goods->updateBatch($good_list->toArray());
                return $this->message('修改分类成功');
            }elseif($flag=='delete'){//删除商品
                $goods->destroy($goods_ids);
                return $this->message('删除成功');
            }else{//下架
                $good_list=Goods::whereIn('goods_id',$goods_ids)->select('goods_id','goods_state')->get();
                $good_list->each(function ($item, $key){
                    $item->goods_state=0;
                });
                $goods->updateBatch($good_list->toArray());
                return $this->message('下架成功');
            }

        }
        return $this->failed('商品id为空');
    }
}