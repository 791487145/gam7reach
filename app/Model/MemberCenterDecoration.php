<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:09 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rMemberCenterDecoration
 *
 * @property int $mc_dec_id
 * @property int $company_id
 * @property string $bg_img
 * @property int $level_enable
 * @property int $qr_code_enable
 * @property string $moudle_enable
 * @property int $rights_enable
 * @property int $page_style
 * @property string $element_setting
 * @property int $created_at
 * @property int $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereBgImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereElementSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereLevelEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereMcDecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereMoudleEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration wherePageStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereQrCodeEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereRightsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\MemberCenterDecoration whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MemberCenterDecoration extends Eloquent
{
	protected $table = '7r_member_center_decoration';
	protected $primaryKey = 'mc_dec_id';
    public $timestamps = true;
    protected $dateFormat = 'U';


	protected $fillable = [
		'company_id',
		'bg_img',
		'level_enable',
		'qr_code_enable',
		'moudle_enable',
		'rights_enable',
		'page_style',
		'element_setting'
	];
	/*
	 * 根据装修设置获取会员数据
	 */
	public function checkAvailable($member){
	    $data=array(
	        'bg_img'=>$this->bg_img,
            'qr_code_enable'=>$this->qr_code_enable,
            'rights_enable'=>$this->rights_enable,
            'page_style'=>$this->page_style,
            'level'=>$this->level_enable,
            'moudle_enable'=>unserialize($this->moudle_enable),
            'element_setting'=>unserialize($this->element_setting),
        );
	    if($data['moudle_enable']['points']){//如果积分模块开启
	        $data['moudle_enable']['points']=array('points'=>1,'points_val'=>$member->member_points);
        }
        if($data['moudle_enable']['predeposit']){//如果储值模块开启
            $data['moudle_enable']['predeposit']=array('predeposit'=>1,'predeposit_val'=>$member->available_predeposit);
        }
        if($data['moudle_enable']['coupon']){//如果卡卷模块开启
            $data['moudle_enable']['coupon']=array('coupon'=>1,'coupon_val'=>0);
        }
	    if($this->level_enable){//如果会员等级开启
            $data['level']=$member->grade()->select(['grade_name'])->get();
        }
        if($this->qr_code_enable){//如果二维码开启
            $data['qr_code_enable']='';
        }
        return $data;
    }
}
