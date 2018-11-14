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
    public function roleShow(Request $request)
    {
        $menus = Menus::defaultOrder()->get()->toTree();

        $roles = Role::whereCompanyId($this->company_id)->orWhere('preinstall_role','<',5)->select('id','role_name','limits','preinstall_role')
                 ->forPage($request->post('page',1),$request->post('limit',10))->get();

        foreach ($roles as $role){

        }
    }

}
