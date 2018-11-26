<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Employ;
use App\Model\Menus;
use App\Model\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RoleController extends BaiscController
{
    /**
     * 角色列表
     * @param Request $request
     * @return mixed
     */
    public function roleList(Request $request)
    {
        $roles = Role::whereCompanyId($this->company_id)->select('id','role_name','descripe')
                 ->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->get();
        foreach ($roles as $role)
        {
            $role->employ_num = Employ::whereCompanyId($this->company_id)->whereRoleId($role->id)->count();
        }

        $data = array(
            'count' => count($roles),
            'roles' => $roles
        );
        return $this->success($data);
    }

    public function roleMenu()
    {
        $menus = Menus::defaultOrder()->get()->toTree();
        return $this->success($menus);
    }

    /**
     * 角色创建
     * @param Request $request
     * @return mixed
     */
    public function roleCreate(Request $request)
    {
        $param = array(
            'role_name' => $request->post('role_name'),
            'descripe' => $request->post('descripe',''),
            'limits' => $request->post('limits'),
            'company_id' => $this->company_id
        );
        if(empty($param['limits'])){
            return $this->failed('请选择权限');
        }
        Role::create($param);
        return $this->created('创建成功');
    }

    /**
     * 角色展示
     * @param Request $request
     * @return mixed
     */
    public function roleShow(Request $request)
    {
        $role = Role::whereId($request->post('role_id'))->select('id','role_name','descripe','limits')->first();
        $menu_id = explode(',',$role->limits);
        $menus = Menus::whereIn('id',$menu_id)->defaultOrder()->get()->toTree();

        $data = array(
           'role' => $role,
           'menus' => $menus
        );
        return $this->success($data);
    }

    /**
     * 角色修改
     * @param Request $request
     * @return mixed
     */
    public function roleUpdate(Request $request)
    {
        $role = Role::whereId($request->post('role_id'))->first();
        if(is_null($role)){
            return $this->failed('暂无角色');
        }
        if($role->preinstall_role){
            return $this->failed('系统角色不能修改');
        }

        $param = array(
            'role_name' => $request->post('role_name'),
            'descripe' => $request->post('descripe',''),
            'limits' => $request->post('limits'),
        );
        if(empty($param['limits'])){
            return $this->failed('请选择权限');
        }
        $role->update($param);
        return $this->message('修改成功');
    }

    /**
     * 修改展示
     * @param Request $request
     * @return mixed
     */
    public function roleUpdateShow(Request $request)
    {
        $role = Role::whereId($request->post('role_id'))->select('id','role_name','descripe','limits')->first();
        if(is_null($role)){
            return $this->failed('暂无角色');
        }

        $data = array(
            'role' => $role,
        );
        return $this->success($data);
    }

    /**
     * 角色删除
     * @param Request $request
     * @return mixed
     */
    public function roleDelete(Request $request)
    {
        $role = Role::whereId($request->post('role_id'))->first();
        if(is_null($role)){
            return $this->failed('暂无角色');
        }
        if($role->preinstall_role <= $this->guide){
            return $this->failed('系统角色不能删除');
        }
        if(Employ::whereRoleId($role->id)->exists()){
            return $this->failed('角色下有管理员存在，不能删除');
        }
        $role->delete();
        return $this->message('删除成功');
    }

}
