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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoodsController extends BaiscController
{


    /*
     * 总商品池
     */
    public function goodsList(Request $request,Goods $goods){
        $goods_list=$goods->getList($request);
        return $this->success($goods_list);
    }
    /*
     * 添加商品
     */
    public function goodsAdd(Request $request){
        $message=array(
            'goods_name.required'=>'商品名称不能为空',
        );
        $validator = Validator::make($request->all(), [
            'goods_name' => 'required',
            'gc_id'=>'required',
        ]);
        var_dump($validator->attributes());
        if ($validator->fails()) {
           return $this->failed($validator->errors());
        }

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