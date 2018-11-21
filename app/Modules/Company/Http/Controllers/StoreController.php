<?php

namespace App\Modules\Company\Http\Controllers;

use App\Exports\StoreExport;
use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\Employ;
use App\Model\Role;
use Cache;
use App\Model\RegisionManager;
use App\Model\Store;
use Illuminate\Http\Request;

class StoreController extends BaiscController
{
    protected $preinstall_role;
    public function __construct()
    {
        parent::__construct();
        $role = auth('employ')->user()->role;
        $this->preinstall_role = $role->preinstall_role;
    }

    /**
     * 企业
     * @param Request $request
     * @return mixed
     */
    public function stores(Request $request)
    {
        $stores = new Store();
        $stores = $stores->whereCompanyId($this->company_id);
        $regions = RegisionManager::whereCompanyId($this->company_id)->select('id','name')->get();
        $employ = auth('employ')->user();

        if($this->preinstall_role == $this->region){
            $stores = $stores->whereNotIn('id',explode(',',$employ->store_id));
        }
        if($this->preinstall_role == $this->shoper){
            $stores = $stores->whereStoreId($employ->shop_id);
        }

        $param = $request->only('reg_id','store_name','store_state');
        if(!empty($param['store_state'])){
            $stores = $stores->whereStoreState($param['store_state']);
        }
        if(!empty($param['reg_id'])){
            $stores = $stores->whereRegId($param['reg_id']);
        }
        if(!empty($param['store_name'])){
            $stores = $stores->where('store_name','like','%'.$param['store_name'].'%');
        }

        $stores = $stores->forPage($request->post('page',1),$request->post('limit',self::LIMIT))
                ->select('store_id','reg_id','store_name','area_info','store_address','store_state','store_phone','store_manager_id')->get();
        foreach ($stores as $store){
            $store->reg_name = RegisionManager::whereId($store->id)->value('name');
            $store->store_state_name = Store::stateCN($store->store_state);
            $store->store_detail_add = Store::addressCN($store->area_info).$store->store_address;
        }

        $data = array(
            'count' => count($stores),
            'stores' => $stores,
            'regions' => $regions
        );
        return $this->success($data);
    }

    public function storesExport(Request $request,StoreExport $storeExport)
    {
        $param = array(
            'store_state' => $request->get('store_state',''),
            'reg_id' => $request->get('reg_id',''),
            'store_name' => $request->get('store_name',''),
            'company_id' => $request->get('company_id',1),
        );
        return $storeExport->withParam($param);
    }

    /**
     * 门店添加
     * @param Request $request
     * @return mixed
     */
    public function storesCreate(Request $request)
    {
        $param = array(
            'province' => $request->post('province'),
            'city' => $request->post('city'),
            'area' => $request->post('area')
        );

        $store = new Store();
        $store->store_name = $request->post('store_name');
        $store->store_phone = $request->post('store_phone');
        $store->store_address = $request->post('store_address');
        $store->area_info = json_encode($param);
        $store->store_manager_id = $request->post('store_manager_id');
        $store->company_id = $this->company_id;
        $store->store_photo = $request->post('store_photo');
        $store->store_description = $request->post('store_description');
        $store->save();

        $store_zip = $request->post('store_zip','');
        if(empty($store_zip)){
            $store_zip = date("ymdHis") . sprintf("%03d", substr($store->id, -3));
        }

        $store->store_name = $store_zip;
        $store->save();
        return $this->created('添加成功');
    }

    /**
     * 获取地区信息
     * @return mixed
     */
    public function getArea()
    {
        $areas = Cache::get('areas');
        return $this->success($areas);
    }

    /**
     * 店长列表
     * @param Request $request
     * @return mixed
     */
    public function storesManager(Request $request)
    {
        $store_manage_id = Store::whereCompanyId($this->company_id)->pluck('store_manager_id');
        $employ_store_mamages = new Employ();
        $employ_store_mamages = $employ_store_mamages->whereCompanyId($this->company_id)->whereNotIn('id',$store_manage_id);

        $role_id = Role::wherePreinstallRole($this->shoper)->whereCompanyId($this->company_id)->value('id');

        $param = $request->only('name','work_no');
        if(!empty($param['name'])){
            $employ_store_mamages = $employ_store_mamages->where('name','like','%'.$param['name'].'%');
        }
        if(!empty($param['work_no'])){
            $employ_store_mamages = $employ_store_mamages->whereWorkNo($param['work_no']);
        }

        $employ_store_mamages = $employ_store_mamages->whereRoleId($role_id)->whereStatus(Employ::STATUS_FORBBIN)->forPage($request->post('page',1),$request->post('limit',self::LIMIT))
                              ->select('id','name','mobile','sex')->get();

        $employ_store_mamages = Employ::employCN($employ_store_mamages);

        $data = array(
            'count' => count($employ_store_mamages),
            'employ_store_mamages' => $employ_store_mamages
        );
        return $this->success($data);
    }


}
