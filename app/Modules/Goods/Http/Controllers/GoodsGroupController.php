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
use App\Model\GoodsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class GoodsGroupController extends BaiscController
{

    /*
     * 商品分组
     */
   public function list(GoodsGroup $goodsGroup){
        $goodsGroup=$goodsGroup->where('company_id',$this->company_id)->get();
        return $this->success($goodsGroup);
   }
   /*
    * 添加商品分组
    */
   public function add(Request $request){
       $message=array(
           'goods_group_name.required'=>'商品分组名称不能为空',
           'goods_group_name.unique'=>'已存在相同的商品分组'
       );
       $validator = Validator::make($request->all(),[
           'goods_group_name' => [
               'required',
               Rule::unique('7r_goods_group')->where(function ($query) {
                   $query->where('company_id', $this->company_id);
               })
               ],
       ],$message);
       $date=$request->all();
       $date['company_id']=$this->company_id;
       if ($validator->fails()) {
           return $this->failed($validator->errors()->first());
       }
       ;
       $goodsGroup=GoodsGroup::create($date);
       if($goodsGroup){
           return $this->success(array('goods_group_id'=>$goodsGroup->goods_group_id,'group_name'=>$goodsGroup->goods_group_name),'添加商品分组成功');
       }
        return $this->failed('添加商品分组失败');
   }
}