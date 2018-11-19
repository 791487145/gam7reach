<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\Department;
use App\Model\Employ;
use App\Model\Menus;
use App\Model\ShoppingGuide;
use App\Model\Store;
use Validator;
use App\Model\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DepartmentController extends BaiscController
{

    /**
     * 部门列表
     * @param Request $request
     * @return mixed
     */
    public function departmentList(Request $request)
    {
        $dapartments = Department::whereCompanyId($this->company_id)->select('dep_name','dep_tel','dep_employ_id','id')
            ->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->get();

        $data = array(
            'department_count' => count($dapartments),
            'departments' => $dapartments,
        );
        return $this->success($data);
    }

    /**
     * 部门创建
     * @param Request $request
     * @return mixed
     */
    public function departmentCreate(Request $request)
    {
        $department = new Department();
        $department->dep_name = $request->post('dep_name');
        $department->dep_description = $request->post('dep_description','');
        $department->company_id = $this->company_id;
        $department->dep_employ_id = $request->post('dep_employ_id',0);
        $department->dep_tel = $request->post('dep_tel',0);
        $department->save();

        return $this->created('创建成功');
    }

    /**
     * 部门展示
     * @param Request $request
     * @return mixed
     */
    public function departmentShow(Request $request)
    {
        $department = Department::whereId($request->post('department_id'))->first();
        return $this->success($department);
    }

    /**
     * 部门修改
     * @param Request $request
     * @return mixed
     */
    public function departmentUpdate(Request $request)
    {
        $department = Department::whereId($request->post('department_id'))->first();

        $department->dep_name = $request->post('dep_name');
        $department->dep_description = $request->post('dep_description','');
        $department->dep_tel = $request->post('dep_tel',0);
        $department->save();
        return $this->message('修改成功');
    }

    /**
     * 部门删除
     * @param Request $request
     * @return mixed
     */
    public function departmentDelete(Request $request)
    {
        $department = Department::whereId($request->post('department_id'))->first();
        if(is_null($department)){
            return $this->failed('暂无此部门');
        }

        if(Employ::whereDepartmentId($department->id)->whereCompanyId($this->company_id)->exists()){
            return $this->failed('部门下有人存在，不能删除');
        };
        $department->delete();
        return $this->message('删除成功');
    }




}
