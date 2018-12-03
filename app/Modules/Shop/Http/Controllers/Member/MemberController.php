<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:33 AM
 */
namespace  App\Modules\Shop\Http\Controllers\Member;
use App\Http\Controllers\ShopBascController;
use App\Model\MemberCenterDecoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends ShopBascController{
    /*
     * 会员中心
     */
    public function home(Request $request){
        $memberCenterDecoration=MemberCenterDecoration::where('company_id',$this->company_id)->first();
        $data=$memberCenterDecoration->checkAvailable($this->member);
        return $this->success($data);
    }
    /*
     * 我的资料
     */
    public function info(Request $request){
        if($request->isMethod('post')){
            $message=array(
                'member_truename.required'=>'会员'
            );
            $validator=Validator::make($request->all(),[
                'member_truename'=>'required',
                'member_sex'=>'required',
                'member_birthday'=>'required'
            ],$message);
            if($validator->fails()){
                return $this->failed($validator->errors()->first());
            }
        }

        if(empty($this->member)){
            return $this->failed('无此用户');
        }
        return $this->success($this->member);
    }
}