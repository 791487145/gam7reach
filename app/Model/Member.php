<?php

/**
 * 会员模型
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use App\Http\Controllers\BaiscController;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMember
 * 
 * @property int $member_id
 * @property string $member_truename
 * @property bool $member_sex
 * @property int $member_grade_id
 * @property int $member_birthday
 * @property string $member_paypwd
 * @property string $member_mobile
 * @property int $member_mobile_bind
 * @property string $member_time
 * @property string $member_login_time
 * @property string $member_old_login_time
 * @property string $member_login_ip
 * @property string $member_old_login_ip
 * @property int $source_channel
 * @property string $weixin_unionid
 * @property string $weixin_info
 * @property int $member_points
 * @property float $available_predeposit
 * @property float $freeze_predeposit
 * @property int $member_exppoints
 * @property string $member_wxopenid
 * @property int $company_id
 * @property int $store_id
 *
 * @package App\Models
 */
class Member extends Eloquent
{
	protected $table = '7r_member';
	protected $primaryKey = 'member_id';
	public $timestamps = false;



	protected $fillable = [
		'member_truename',
		'member_sex',
		'member_grade_id',
		'member_birthday',
		'member_paypwd',
		'member_mobile',
		'member_mobile_bind',
		'member_time',
		'member_login_time',
		'member_old_login_time',
		'member_login_ip',
		'member_old_login_ip',
		'source_channel',
		'weixin_unionid',
		'weixin_info',
		'member_points',
		'available_predeposit',
		'freeze_predeposit',
		'member_exppoints',
		'member_wxopenid',
		'company_id',
		'store_id'
	];
	/*
	 * 获取来源
	 */
	protected function getChannel($key){
	    $source_channel=array(
	        '1'=>'自主注册',
            '2'=>'导购招募',
            '3'=>'活动',
        );
	    return $source_channel[$key];
    }
	/*
	 * 会员标签
	 */
	public function tags(){
	    return $this->belongsToMany(MemberTag::class,'7r_mtag_member','member_id','mtag_id');
    }
    /*
     * 会员等级
     */
    public function grade(){
        return $this->hasOne(MemberGrade::class,'grade_id','member_grade_id');
    }
    /*
     * 所属门店
     */
    public function store(){

       return $this->hasOne(Store::class,'store_id','store_id');

    }
    /*
     * 会员列表
     */
    public function getList($request,$company_id,$store_Id){
        $whereIn='0=0';
        if($store_Id){//如果是店长或是区经
            $whereIn="store_id in($store_Id)";
        }
        $where['company_id']=$company_id;
        if($request->input('member_truename')){//姓名筛选
            $where['member_truename']=$request->input('member_truename');
        }
        if($request->input('member_mobile')){//手机号筛选
            $where['member_mobile']=$request->input('member_mobile');
        }
        if($request->input('store_id')){//所属门店
            $where['store_id']=$request->input('store_id');
        }
        if($request->input('source_channel')){//来源渠道
            $where['source_channel']=$request->input('source_channel');
        }
        $list=$this->with(['grade'=>function($query){
            $query->select(['grade_id','grade_name']);
        },'store'=>function($query){
            $query->select(['store_id','store_name']);
        }])->where($where)->whereRaw($whereIn)->forPage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
        $list->each(function ($item,$key){
            $item->member_sex=$item->member_sex?'男':'女';
            $item->source_channel=$this->getChannel($item->source_channel);
            $item->member_birthday=date('Y-m-d H:i:s',$item->member_birthday);
        });
        return $list;
    }
	/*
	 * 添加会员
	 */
	public function add($date){
        $date['member_time']=time();
        if(!$member=$this->create($date)){
            return false;
        }
        if(isset($date['tag_id'])){//如果有会员标签
            $tag_ids=$date['tag_id'];
            if(!is_array($tag_ids)){
                $tag_ids=compact('tag_ids');
            }
            //添加会员与标签的关联
            if(!$member->tags()->sync($tag_ids,false)){
                return false;
            }
        }
        return true;
    }
    /*
     * 编辑会员
     */
    public function edit($date){
        $member=$this->find($date['member_id']);
        if(!$member->update($date)){
            return false;
        }
        if(isset($date['tag_id'])){//如果有会员标签
            $tag_ids=$date['tag_id'];
            if(!is_array($tag_ids)){
                $tag_ids=compact('tag_ids');
            }
            //修改会员与标签的关联
            if(!$member->tags()->sync($tag_ids,true)){
                return false;
            }
        }
        return true;
    }
}
