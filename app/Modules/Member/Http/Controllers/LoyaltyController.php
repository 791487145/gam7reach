<?php
/**
 * Created by PhpStorm.
 * User: 23261
 * Date: 2018/11/19
 * Time: 17:58
 */
namespace APP\Modules\Member\Http\Controllers;
use App\Http\Controllers\BaiscController;
use App\Model\MemberCenterDecoration;
use Illuminate\Http\Request;

class LoyaltyController extends BaiscController{
    /*
     * 会员中心装修设置
     */
    public function decoration(Request $request){
        if($request->isMethod('post')){

        }
        $decoration_info=MemberCenterDecoration::where('company_id',$this->company_id)->first();
        if($decoration_info){
            $decoration_info->moudle_enable=unserialize($decoration_info->moudle_enable);
            $decoration_info->element_setting=unserialize($decoration_info->element_setting);
        }
        return $this->success($decoration_info);
    }
}