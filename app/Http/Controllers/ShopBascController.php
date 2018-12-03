<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:26 AM
 */
namespace App\Http\Controllers;
class ShopBascController extends BascController{
    protected $company_id;//企业id
    protected $member;
    public function __construct()
    {
        $this->middleware(function($request,$next){
            $member=auth('member')->user();
            if(empty($member)){
                return $this->failed('token过期或不正确');
            }
            $this->member=$member;
            $this->company_id=$member->company_id;
            return $next($request);
        });
    }
}