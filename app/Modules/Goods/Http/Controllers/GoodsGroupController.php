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
        $goodsGroup=$goodsGroup->where('company_id',$goodsGroup->company_id)->get();
        return $this->success($goodsGroup);
   }
   /*
    * 添加商品分组
    */
   public function add(Request $request){
       //var_dump(base64_decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJpYXQiOjE1NDIxNjU3ODUsImV4cCI6MTU0MjE2OTM4NSwibmJmIjoxNTQyMTY1Nzg1LCJqdGkiOiJFVHE1QlVNNjFCVGxLU25TIiwic3ViIjo1LCJwcnYiOiJiYzllODM3OWViMjI1OTQ3NjA1MDNjYTIyYmNhZjI3YzNhMWE4NjY5IiwiMCI6eyJjb21wYW55X2lkIjoxMn19.9XfkVWtyvEpmokNVy3wwxahjgyY-svwigUwa_Tdcjd8'));
       $payload = auth('employ')->payload();
       dd($payload->get('sub'));
       $message=array(
           'goods_group_name.required'=>'商品分组名称不能为空',
           'goods_group_name.unique'=>'已存在相同的商品分组'
       );
       $validator = Validator::make($request->all(),[
           'goods_group_name' => [
               'required',
               Rule::unique('7r_goods_group')->where(function ($query) {
                   $query->where('company_id', 1);
               })
               ],
       ],$message);
       $date=$request->all();
       $date['company_id']=1;
       if ($validator->fails()) {
           return $this->failed($validator->errors());
       }
       ;
       if(GoodsGroup::create($date)){
           return $this->message('添加商品分组成功');
       }
        return $this->failed('添加商品分组失败');
   }
}