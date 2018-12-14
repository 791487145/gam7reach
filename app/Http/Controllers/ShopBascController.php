<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:26 AM
 */
namespace App\Http\Controllers;
use App\Model\WebShop;

class ShopBascController extends BascController{
    protected $company_id;//企业id
    protected $member;
    protected $addressCount=10;
    protected $shop_id;
    protected $shop_info;
    public function __construct()
    {
        $this->middleware(function($request,$next){
            $member=auth('member')->user();
            if(empty($member)){
                return $this->failed('token过期或不正确');
            }
            $this->member=$member;
            $this->company_id=$member->company_id;
            $this->shop_id = WebShop::whereCompanyId($member->company_id)->value('shop_id');
            $this->shop_info=WebShop::whereCompanyId($member->company_id)->first();
            return $next($request);
        });
    }
}
