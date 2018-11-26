<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 02:47:51 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rCouponTemplate
 * 
 * @property int $coupon_t_id
 * @property int $company_id
 * @property string $coupon_t_title
 * @property string $coupon_t_desc
 * @property int $coupon_t_start_date
 * @property int $coupon_t_end_date
 * @property float $coupon_t_price
 * @property float $coupon_t_limit
 * @property int $coupon_t_state
 * @property int $coupon_t_total
 * @property int $coupon_t_giveout
 * @property int $coupon_t_used
 * @property int $coupon_t_add_date
 * @property int $coupon_t_eachlimit
 * @property string $coupon_t_style
 * @property bool $coupon_t_recommend
 *
 * @package App\Models
 */
class CouponTemplate extends Eloquent
{
	protected $table = '7r_coupon_template';
	protected $primaryKey = 'coupon_t_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'coupon_t_start_date' => 'datetime:Y-m-d H:i',
		'coupon_t_end_date' => 'datetime:Y-m-d H:i',
		'coupon_t_price' => 'float',
		'coupon_t_limit' => 'float',
		'coupon_t_total' => 'int',
		'coupon_t_giveout' => 'int',
		'coupon_t_used' => 'int',
		'coupon_t_add_date' => 'datetime:Y-m-d H:i',
		'coupon_t_eachlimit' => 'int',
		'coupon_t_recommend' => 'bool'
	];

	protected $fillable = [
		'company_id',
		'coupon_t_title',
		'coupon_t_desc',
		'coupon_t_start_date',
		'coupon_t_end_date',
		'coupon_t_price',
		'coupon_t_limit',
		'coupon_t_state',
		'coupon_t_total',
		'coupon_t_giveout',
		'coupon_t_used',
		'coupon_t_add_date',
		'coupon_t_eachlimit',
		'coupon_t_style',
		'coupon_t_recommend'
	];
	/*
	 * 优惠券旗舰店关联
	 */
	public function shop(){
	    return $this->belongsToMany(CouponShop::class,'7r_coupon_shop','coupon_t_id','shop_id');
    }
    /*
     * 优惠券云店关联
     */
    public function store(){
        return $this->belongsToMany(CouponStore::class,'7r_coupon_store','coupon_t_id','store_id');
    }
    /*
     * 优惠券列表
     */
    public function list($request,$company_id){
        $where['company_id']=$company_id;
        if($request->input('coupon_t_title')){ //优惠券名称
            $where['coupon_t_title']=$request->input('coupon_t_title');
        }
        if($request->input('coupon_t_state')){//优惠卷状态
            $where['coupon_t_state']=$request->input('coupon_t_state');
        }
        $list=$this->where($where)->forPage($request->input('page',1),$request->input('limit',10))->get();
        $list->each(function ($item,$key){
            $item->coupon_t_state=$item->coupon_t_state?'有效':'过期';
            $limit=$item->coupon_t_limit?"订单满{$item->coupon_t_limit}元,":'无门槛,';
            $item->pre_content="{$limit}减免金额：{$item->coupon_t_price}元";
        });
        return $list;
    }

}
