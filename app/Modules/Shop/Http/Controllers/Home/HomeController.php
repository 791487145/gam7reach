<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/5
 * Time: 10:52 AM
 */
namespace  App\Modules\Shop\Http\Controllers\Home;
use App\Http\Controllers\ShopBascController;
use App\Model\ShopGood;
use App\Model\WebShop;
use Illuminate\Http\Request;

class HomeController extends ShopBascController{
    /*
     * 旗舰店首页
     */
    public function  home(Request $request){
        $shop_home_info=array(
            'shop_slide'=>unserialize($this->shop_info->shop_slide),//幻灯片
            'notice'=>$this->getNotice(),//公告
            'adv_list'=>$this->getAdv(),//广告
            'home_goods'=>$this->getShopGoods(),
        );
        return $this->success($shop_home_info);
    }
    /*
     * 领劵中心
     */
    public function receiveCoupon(Request $request){
        //获取有效的店铺优惠券
        $shop_coupons=$this->shop_info->coupons()->where('coupon_t_state',1)->get();
        return $this->success($shop_coupons);
    }
    /*
     * 获取首页推荐商品
     */
    private function getShopGoods(){
        $goods=ShopGood::with(['goods'=>function($query){//首页推荐商品
            $query->select(['goods_id','goods_name','goods_image','goods_jingle','goods_marketprice']);
        }])->Online()->Commend()
            ->where(['company_id'=>$this->company_id,'shop_id'=>$this->shop_id])->get();
        return $goods;
    }
    /*
     * 店铺公告
     */
    private function getNotice(){
        return '';
    }
    /*
     * 店铺广告
     */
    private function getAdv(){
        return '';
    }
}