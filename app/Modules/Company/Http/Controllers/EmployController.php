<?php

namespace App\Modules\Company\Http\Controllers;

use App\Exports\EmployExport;
use App\Http\Controllers\BaiscController;
use App\Model\Department;
use App\Model\Employ;
use App\Model\Menus;
use App\Model\ShoppingGuide;
use App\Model\Store;
use Validator;
use App\Model\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmployController extends BaiscController
{
    /**
     * 员工列表
     * @param Request $request
     * @return mixed
     */
    public function employsList(Request $request,Employ $employ)
    {
        $departments = Department::whereCompanyId($this->company_id)->select('id','dep_name')->get();
        $roles = Role::whereCompanyId($this->company_id)->where('preinstall_role','<',$this->guide)->select('id','role_name')->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->get();
        $param = $request->only('page','limit','work_no','mobile','department_id','role_id');

        $employs = Employ::employList($employ,$this->company_id,$param);

        $data = array(
            'count' => count($employs),
            'departments' => $departments,
            'roles' => $roles,
            'employs' => $employs
        );
        return $this->success($data);
    }

    /**
     * 创建展示
     * @return mixed
     */
    public function employCreateShow()
    {
        $departments = Department::whereCompanyId($this->company_id)->select('id','dep_name')->get();
        $roles = Role::whereCompanyId($this->company_id)->select('id','role_name')->get();
        $stores = Store::whereCompanyId($this->company_id)->select('store_id','store_name')->get();

        $data = array(
            'departments' => $departments,
            'roles' => $roles,
            'stores' => $stores
        );
        return $this->success($data);
    }

    /**
     * 员工创建
     * @param Request $request
     * @return mixed
     */
    public function employCreate(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'name' => 'required',
            'mobile' => 'required',
            'sex' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'required',
            'password' => 'required',
        ],[
            'name.required' => '请填写员工姓名',
            'mobile.required' => '请填写员工手机',
            'sex.required' => '请填写员工性别',
            'department_id.required' => '请填写员工部门',
            'role_id.required' => '请填写员工角色',
            'status.required' => '请填写员工状态',
            'password.required' => '请填写员工密码',
        ]);
        $error = $validator->errors()->all();
        if(count($error)){
            return $this->failed($error[0]);
        }

        $work_no = $request->post('work_no','');
        if(!empty($work_no) && Employ::whereWorkNo($work_no)->whereCompanyId($this->company_id)->exists()){
            return $this->failed('当前工号已存在');
        };

        $param = array(
            'name' => $request->post('name'),
            'mobile' => $request->post('mobile',''),
            'sex' => $request->post('sex'),
            'department_id' => $request->post('department_id'),
            'role_id' => $request->post('role_id'),
            'status' => $request->post('status'),
            'password' => bcrypt($request->post('password')),
            'company_id' => $this->company_id,
            'shop_id' => $request->post('shop_id',0)
        );

        $employ = Employ::create($param);

        if(empty($work_no)){
            $work_no = date("ymdHis") . sprintf("%03d", substr($employ->id, -3));
        }
        $employ->work_no = $work_no;
        $employ->save();

        return $this->created('创建成功');
    }


    /**
     * 角色修改
     * @param Request $request
     * @return mixed
     */
    public function employUpdate(Request $request)
    {
        $employ = Employ::whereId($request->post('role_id'))->first();

        $param = array(
            'name' => $request->post('name'),
            'mobile' => $request->post('mobile',''),
            'sex' => $request->post('sex'),
            'department_id' => $request->post('department_id'),
            'role_id' => $request->post('role_id'),
            'status' => $request->post('status'),
            'shop_id' => $request->post('shop_id',0)
        );
        $employ->update($param);

        $work_no = $request->post('work_no','');
        if(empty($work_no)){
            return $this->failed('工号不能为空');
        }

        if(Employ::whereWorkNo($work_no)->whereCompanyId($this->company_id)->exists()){
            return $this->failed('当前工号已存在');
        };

        $employ->update(['work_no' => $work_no]);
        return $this->message('修改成功');
    }

    /**
     * 修改展示
     * @param Request $request
     * @return mixed
     */
    public function employUpdateShow(Request $request)
    {
        $employ = Employ::whereId($request->post('employ_id'))->first();
        if(is_null($employ)){
            return $this->failed('当前员工不存在');
        }
        $departments = Department::whereCompanyId($this->company_id)->select('id','dep_name')->get();
        $roles = Role::whereCompanyId($this->company_id)->select('id','role_name')->get();
        $stores = Store::whereCompanyId($this->company_id)->select('store_id','store_name')->get();

        $data = array(
            'employ' => $employ,
            'departments' => $departments,
            'roles' => $roles,
            'stores' => $stores
        );
        return $this->success($data);
    }

    /**
     * 密码重置
     * @param Request $request
     * @return mixed
     */
    public function employPassword(Request $request)
    {
        $employ = Employ::whereId($request->post('employ_id'))->first();
        if(is_null($employ)){
            return $this->failed('当前员工不存在');
        }
        $employ->update(['password' => bcrypt($request->post('password'))]);
        return $this->message('修改成功');
    }

    /**
     * 员工导出
     * @param Request $request
     * @param EmployExport $employExport
     * @return EmployExport
     */
    public function employsExport(Request $request,EmployExport $employExport)
    {
        $param = array(
            'role_id' => $request->get('role_id',''),
            'department_id' => $request->get('department_id',''),
            'work_no' => $request->get('work_no',''),
            'mobile' => $request->get('mobile',''),
            'company_id' => $request->get('company_id',1),
        );
        return $employExport->withParam($param);
    }

}
