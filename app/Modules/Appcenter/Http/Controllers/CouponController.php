<?php
/**
 * Created by PhpStorm.
 * User: 23261
 * Date: 2018/11/26
 * Time: 10:04
 */
namespace App\Modules\Appcenter\Http\Controllers;
use App\Http\Controllers\BaiscController;
use App\Model\CompanyService;
use App\Model\CouponTemplate;
use App\Model\Employ;
use App\Model\Store;
use App\Model\WebShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CouponController extends BaiscController{
    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request,$next){
            $companyService=CompanyService::where(['company_id'=>$this->company_id,'service_type'=>3])->first();
            if(!$companyService){
                return $this->failed('优惠券服务已过期，请重新购买');
            }
            if(!$companyService->service_state){//判断优惠券服务是否过期
                return $this->failed('优惠券服务已过期，请重新购买');
            }
            return $next($request);
        });
    }

    /*
     * 优惠券列表
     */
    public function list(Request $request,CouponTemplate $couponTemplate){
        $coupons=$couponTemplate->list($request,$this->company_id);
        $data['coupon_count']=$coupons->count();
        $data['coupons']=$coupons;
        return $this->success($data);
    }
    /*
     * 添加优惠券
     */
    public function add(Request $request){
        $message=array(
            'coupon_t_title.required'=>'优惠券名称不能为空',
            'coupon_t_title.max'=>'请勿超出9个字',
            'coupon_t_total.required'=>'发放总量不能为空',
            'coupon_t_total.numeric'=>'发放总量必须是数字',
            'use_range.required'=>'适用店铺不能为空',
            'coupon_t_limit.required'=>'使用门槛不能为空',
            'coupon_t_limit.numeric'=>'使用门槛必须是数字',
            'coupon_t_price.required'=>'减免金额不能为空',
            'coupon_t_price.numeric'=>'减免金额必须是数字',
            'coupon_t_start_date.required'=>'优惠券开始时间不能为空',
            'coupon_t_end_date.required'=>'优惠券结束时间不能为空',
            'coupon_t_eachlimit.required'=>'限领次数不能为空',
            'coupon_t_eachlimit.numeric'=>'限领次数必须为数字',
            'coupon_t_desc.required'=>'使用说明不能为空',
        );
        $validator=Validator::make($request->all(),[
            'coupon_t_title'=>'required|max:9',
            'coupon_t_total'=>'required|numeric',
            'use_range'=>'required',
            'coupon_t_limit'=>'required|numeric',
            'coupon_t_price'=>'required|numeric',
            'coupon_t_start_date'=>'required',
            'coupon_t_end_date'=>'required',
            'coupon_t_eachlimit'=>'required|numeric',
            'coupon_t_desc'=>'required'

        ],$message,[]);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }
        $limit=$request->input('coupon_t_limit')?"订单满{$request->input('coupon_t_limit')}元,":'无门槛,';
        $insert_array=array(
            'coupon_t_title'=>$request->input('coupon_t_title'),
            'coupon_t_total'=>$request->input('coupon_t_total'),
            'coupon_t_limit'=>$request->input('coupon_t_limit'),
            'coupon_t_price'=>$request->input('coupon_t_price'),
            'coupon_t_start_date'=>$request->input('coupon_t_start_date'),
            'coupon_t_end_date'=>$request->input('coupon_t_end_date'),
            'company_id'=>$this->company_id,
            'coupon_t_eachlimit'=>$request->input('coupon_t_eachlimit'),
            'coupon_t_desc'=>$request->input('coupon_t_desc')."\n优惠内容：{$limit} 减免{$request->input('coupon_t_price')}",
            'coupon_t_add_date'=>time(),
            'use_range'=>$request->input('use_range'),
        );
        if($insert_array['coupon_t_end_date']<=$insert_array['coupon_t_start_date']){
            return $this->failed('结束时间必须大于开始时间');
        };
        DB::beginTransaction();
        try{
            $coupon=CouponTemplate::create($insert_array);
            if(!$coupon){
               throw  new \Exception('添加优惠券失败');
            }
            if($request->input('use_range')==2){//如果是指定店铺
                if(empty($request->input('shop_id'))&&empty($request->input('store_id'))){
                    return $this->failed('请指定店铺');
                }
                $coupon->shop()->sync($request->input('shop_id'),false);
                $coupon->store()->sync($request->input('store_id'),false);
            }elseif($request->input('use_range')==1){//如果是全部店铺
                $webshop=WebShop::where('company_id',$this->company_id)->first();
                if(empty($webshop)){
                    return $this->failed('旗舰店信息错误');
                }
                $coupon->shop()->sync($webshop->shop_id,false);
                $store_ids=Store::where(['company_id'=>$this->company_id,'store_state'=>1])->select('store_id')->get()->toArray();
                if(empty($store_ids)){
                    return $this->failed('云店店信息错误');
                }
                $coupon->store()->sync($store_ids,false);
            }
            DB::commit();
            return $this->message('添加优惠卷成功');
        }catch (\Exception $e){
            DB::rollBack();
            return $this->failed($e->getMessage());
        }
    }
    /*
     * 编辑优惠券
     */
    public function edit(Request $request){
        $coupon_t_id=$request->input('coupon_t_id');
        if(!$coupon_t_id){
            return $this->failed('优惠券id不能为空');
        }
        $coupon_info=CouponTemplate::with()->where('coupon_t_id',$coupon_t_id)->get();
        if($coupon_info){
            return $this->success($coupon_info);
        }
        return $this->failed('无此优惠券');
    }
}