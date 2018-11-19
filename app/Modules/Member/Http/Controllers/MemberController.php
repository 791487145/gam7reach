<?php
/**
 * Created by PhpStorm.
 * User: 23261
 * Date: 2018/11/19
 * Time: 9:35
 */
namespace App\Modules\Member\Http\Controllers;
use App\Http\Controllers\BaiscController;
use App\Model\Member;
use App\Model\MemberGrade;
use App\Model\MemberTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MemberController extends BaiscController{
    /*
     * 会员列表
     */
    public function list(Request $request,Member $member){
        $member_list=$member->getList($request,$this->company_id);
        return $this->success($member_list);
    }
    /*
     * 添加会员
     */
    public function add(Request $request,Member $member){
        $message=array(
            'member_truename.required'=>'会员姓名不能为空',
            'member_mobile.required'=>'手机号不能为空',
            'member_mobile.is_mobile'=>'手机号码不正确',
            'member_mobile.unique'=>'此手机号已存在',
            'member_sex.required'=>'会员姓名不能为空',
            'member_birthday.required'=>'会员生日不能为空',
            'member_grade_id.required'=>'请选择会员等级',
        );
        $validator=Validator::make($request->all(),[
            'member_truename'=>'required',
            'member_mobile'=>['required','is_mobile',
                Rule::unique('7r_member')->where(function($query){
                    $query->where('company_id',$this->company_id);
                }),
                ],
            'member_sex'=>'required',
            'member_birthday'=>'required',
            'member_grade_id'=>'required',
        ],$message);
        if($validator->fails()){
            return $this->failed($validator->errors()->first());
        }
        $date=$request->all();
        $date['company_id']=$this->company_id;
        $date['member_mobile_bind']=1;
        if($member->add($date)){
            return $this->message('会员添加成功');
        }
        return $this->failed('会员添加失败');

    }
    /*
     * 编辑会员
     */
    public function edit(Request $request,Member $member){
        if($request->isMethod('post')){
            $message=array(
                'member_id.required'=>'会员id不能为空',
                'member_truename.required'=>'会员姓名不能为空',
                'member_mobile.required'=>'手机号不能为空',
                'member_mobile.is_mobile'=>'手机号码不正确',
                'member_sex.required'=>'会员姓名不能为空',
                'member_birthday.required'=>'会员生日不能为空',
                'member_grade_id.required'=>'请选择会员等级',
            );
            $validator=Validator::make($request->all(),[
                'member_id'=>'required',
                'member_truename'=>'required',
                'member_mobile'=>'required|is_mobile',
                'member_sex'=>'required',
                'member_birthday'=>'required',
                'member_grade_id'=>'required',
            ],$message);
            if($validator->fails()){
                return $this->failed($validator->errors()->first());
            }
            $date=$request->all();
            $date['company_id']=$this->company_id;
            if($member->edit($date)){
                return $this->message('会员编辑成功');
            }
            return $this->failed('会员编辑失败');

        }
        $member_id=$request->input('member_id');
        if($member_id){
            $member_info=Member::with(['grade'=>function($query){
                $query->select(['grade_id','grade_name']);
            },'tags'=>function($query){
                $query->select(['tag_id','mtag_name']);
            }])->find($member_id);
            //获取启用的会员等级列表
            $member_grades=MemberGrade::Enable()->where('company_id',$this->company_id)
                ->select(['grade_id','grade_name'])->get();
            $member_info['member_grade']=$member_grades;
            //获取会员标签
            $member_tags=MemberTag::where('company_id',$this->company_id)
                ->select(['tag_id','mtag_name'])->get();
            $member_info['member_tags']=$member_tags;
            return $this->success($member_info);
        }
        return $this->failed('会员id不能为空');
    }
    /*
     * 批量操作
     */
    public function batch(Request $request,Member $member){
        $flag=$request->input('flag');
        $member_ids=$request->input('member_id');
        if(is_array($member_ids)){
            if($flag=='delete'){//删除会员
                if($member->destroy($member_ids)){
                    return $this->message('删除会员成功');
                }
                return $this->failed('删除会员失败');
            }
        }
        return $this->failed('会员id不能为空');
    }
}