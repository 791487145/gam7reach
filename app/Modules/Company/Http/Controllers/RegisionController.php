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

    /**
     * 店铺展示
     * @param Request $request
     * @return mixed
     */
    public function regisionCreateStoreShow(Request $request)
    {
        $stores = new Store();
        $stores = $stores->whereCompanyId($this->company_id);
        $StoreName = $request->post('store_name','');
        if(!empty($StoreName)){
            $stores = $stores->where('store_name','like','%'.$StoreName.'%');
        }
        $stores = $stores->forPage($request->post('page',1),$request->post('limit',self::LIMIT))->select('store_id','store_name')->get();

        return $this->success($stores);
    }

    /**
     * 人员展示
     * @param Request $request
     * @return mixed
     */
    public function regisionCreateEmployShow(Request $request)
    {
        $role = Role::whereCompanyId($this->company_id)->wherePreinstallRole($this->region)->first();
        //$reg_employ_id = RegisionManager::whereCompanyId($this->company_id)->pluck('reg_employ_id');
        /*if(empty($reg_employ_id)){
            $reg_employ_id = array();
        }*/
        $employs = Employ::whereCompanyId($this->company_id)->whereRoleId($role->id)->select('id','name')->get();
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
        Store::whereIn('store_id',explode(',',$store_id))->update(['reg_id' => $regision->id]);
        DB::commit();
        return $this->created('创建成功');
    }

    /**
     * 区域展示
     * @param Request $request
     * @return mixed
     */
    public function regisionShow(Request $request)
    {
        $regision = RegisionManager::whereId($request->post('regision_manage_id'))->first();
        $regision->store_id = Store::whereRegId($regision->id)->pluck('store_id');
        return $this->success($regision);
    }

    /**
     * 区域修改
     * @param Request $request
     * @return mixed
     */
    public function regisionUpdate(Request $request)
    {
        $regision = RegisionManager::whereId($request->post('regision_manage_id'))->first();
        DB::beginTransaction();
        $regision->name = $request->post('name');
        $regision->mobile = $request->post('mobile','');
        $regision->save();

        $store_id = $request->post('store_id');
        $reg_employ_id = $request->post('reg_employ_id');
        if($regision->reg_employ_id != $reg_employ_id){
            Employ::whereId($regision->reg_employ_id)->update(['store_id' => null]);
            $regision->reg_employ_id = $reg_employ_id;
            $regision->save();
        }

        Employ::whereId($reg_employ_id)->update(['store_id' => $store_id]);
        Store::whereIn('store_id',explode(',',$regision->store_id))->update(['reg_id' => 0]);
        Store::whereIn('store_id',explode(',',$store_id))->update(['reg_id' => $regision->id]);
        DB::commit();
        return $this->message('修改成功');
    }

    /**
     * 区域删除
     * @param Request $request
     * @return mixed
     */
    public function regisionDelete(Request $request)
    {
        $regision = RegisionManager::whereId($request->post('regision_manage_id'))->first();
        if(is_null($regision)){
            return $this->failed('暂无此区域');
        }

        if(Store::whereRegId($regision->id)->whereCompanyId($this->company_id)->exists()){
            return $this->failed('区域下有门店存在，不能删除');
        };
        $regision->delete();
        Employ::whereId($regision->reg_employ_id)->update(['store_id' => null]);
        return $this->message('删除成功');
    }




}
