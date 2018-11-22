<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\Department;
use App\Model\Employ;
use App\Model\Menus;
use App\Model\RegisionManager;
use App\Model\ShoppingGuide;
use App\Model\Store;
use Validator;
use App\Model\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;

class RegisionController extends BaiscController
{

    /**
     * 区域列表
     * @param Request $request
     * @return mixed
     */
    public function regisionList(Request $request)
    {
        $regisions = RegisionManager::whereCompanyId($this->company_id)->select('id','mobile','name','reg_employ_id')
            ->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->get();

        foreach ($regisions as $regision){
            $regision->store_count = Store::whereRegId($regision->id)->count();
            $regision->regision_manage_name = Employ::whereId($regision->reg_employ_id)->value('name');
        }

        $data = array(
            'count' => count($regisions),
            'regisions' => $regisions,
        );
        return $this->success($data);
    }

    public function regisionCreateStoreShow(Request $request)
    {
        $stores = new Store();
        $stores = $stores->whereCompanyId($this->company_id)->whereNull('reg_id');
        $StoreName = $request->post('StoreName','');
        if(!empty($StoreName)){
            $stores = $stores->where('store_name','like','%'.$StoreName.'%');
        }
        $stores = $stores->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->select('store_id','store_name')->get();

        return $this->success($stores);
    }

    public function regisionCreateEmployShow(Request $request)
    {
        $role = Role::whereCompanyId($this->company_id)->wherePreinstallRole($this->region)->first();
        $reg_employ_id = RegisionManager::whereCompanyId($this->company_id)->pluck('reg_employ_id');
        $employs = Employ::whereCompanyId($this->company_id)->whereNotIn('id',$reg_employ_id)->whereRoleId($role->id)->select('id','name')->get();
        return $this->success($employs);
    }

    /**
     * 区域创建
     * @param Request $request
     * @return mixed
     */
    public function regisionCreate(Request $request)
    {
        DB::beginTransaction();
        $regision = new RegisionManager();
        $regision->name = $request->post('name');
        $regision->mobile = $request->post('mobile');
        $regision->reg_employ_id = $request->post('reg_employ_id');
        $regision->company_id = $this->company_id;
        $regision->save();

        $store_id = $request->post('store_id');
        Employ::whereId($regision->reg_employ_id)->update(['store_id' => $store_id]);
        Store::whereIn('id',explode(',',$store_id))->update(['reg_id' => $regision->id]);
        DB::commit();
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
