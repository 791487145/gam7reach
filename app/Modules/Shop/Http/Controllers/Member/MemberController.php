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
    public function info(){
        
    }
}