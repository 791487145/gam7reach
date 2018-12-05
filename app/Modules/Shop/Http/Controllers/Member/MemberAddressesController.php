<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 1:36 PM
 */
namespace  App\Modules\Shop\Http\Controllers\Member;
use App\Http\Controllers\ShopBascController;
use App\Model\MAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class  MemberAddressesController extends ShopBascController{

    /*
     * 会员地址列表
     */
    public function list(Request $request){
        $addresses=$this->member->addresses()->select(['address_id','true_name',
            'mob_phone','address','tag_name','is_default'])->get();
        if($addresses){
            return $this->success($addresses);
        }

    }
    /*
     * 添加会员地址
     */
    public function add(Request $request){
        $count=$this->member->addresses->count();
        if($count>=$this->addressCount){
            return $this->failed("地址总数超过{$this->addressCount}个");
        }
        $message=array(
            'true_name.required'=>'联系人不能为空',
            'area_info.required'=>'收货地区不能为空',
            'address.required'=>'收货地址不能为空',
            'mob_phone.required'=>'联系人电话不能为空',
            'mob_phone.is_mobile'=>'电话格式不正确',
        );
        $validator=Validator::make($request->all(),[
            'true_name'=>'required',
            'area_info'=>'required',
            'address'=>'required',
            'mob_phone'=>'required|is_mobile',
        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }
        $data=$request->all();
        $data['member_id']=$this->member->member_id;
        $address=MAddress::create($data);
        if($address){
            return $this->success(array('address_id'=>$address->address_id),'会员地址添加成功');
        }
        return $this->failed('会员地址添加失败');
    }
    /*
     * 编辑收货地址
     */
    public function edit(Request $request){
        if($request->isMethod('post')){
            $message=array(
                'address_id.required'=>'地址id不能为空',
                'true_name.required'=>'联系人不能为空',
                'area_info.required'=>'收货地区不能为空',
                'address.required'=>'收货地址不能为空',
                'mob_phone.required'=>'联系人电话不能为空',
                'mob_phone.is_mobile'=>'电话格式不正确',
            );
            $validator=Validator::make($request->all(),[
                'address_id'=>'required',
                'true_name'=>'required',
                'area_info'=>'required',
                'address'=>'required',
                'mob_phone'=>'required|is_mobile',
            ],$message);
            if($validator->fails()){
                return $this->failed($validator->errors()->first());
            }
            $data=$request->all();
            if(MAddress::find($data['address_id'])->update($data)){
                return $this->message('会员地址编辑成功');
            }
            return $this->failed('会员地址编辑失败');
        }
        $address_id=$request->input('address_id');
        if(empty($address_id)){
            return $this->failed('地址id不能为空');
        }
        $address_info=MAddress::find($address_id);
        return $this->success($address_info);
    }
    /*
     * 删除地址
     */
    public function delete(Request $request){
        $address_id=$request->input('address_id');
        if(!$address_id){
            return $this->failed('地址id不能为空');
        }
        if(MAddress::destroy($address_id)){
            return $this->message('会员地址删除成功');
        }
        return $this->failed('会员地址删除失败');
    }
}