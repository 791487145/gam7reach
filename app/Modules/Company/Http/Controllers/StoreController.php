<?php

namespace App\Modules\Company\Http\Controllers;

use App\Exports\StoreExport;
use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\Employ;
use App\Model\Role;
use App\Model\ShoppingGuide;
use Cache;
use App\Model\RegisionManager;
use App\Model\Store;
use Illuminate\Http\Request;
use UUID;

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
            $store->store_manager_name = '';
            if(Employ::whereId($store->store_manager_id)->exists()){
                $store->store_manager_name = $store->empoly()->first()->name;
            }
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
            'company_id' => $this->company_id,
        );
        return $storeExport->withParam($param);
    }

    /**
     * 店铺详情
     * @param Request $request
     * @return mixed
     */
    public function storeShow(Request $request)
    {
        $store = Store::whereStoreId($request->post('store_id'))->first();
        if(is_null($store)){
            return $this->failed('暂无此商店');
        }
        return $this->success($store);
    }

    /**
     * 店铺修改
     * @param Request $request
     * @return mixed
     */
    public function storeUpdate(Request $request)
    {
        $store = Store::whereStoreId($request->post('store_id'))->first();
        if(is_null($store)){
            return $this->failed('暂无此商店');
        }

        $param = array(
            'store_name' => $request->post('store_name'),
            'store_phone' => $request->post('store_phone'),
            'store_address' => $request->post('store_address'),
            'area_info' => $request->post('area_info'),
            'store_photo' => $request->post('store_photo'),
            'store_description' => $request->post('store_description')
        );
        $store_zip = $request->post('store_zip');
        if($store->store_zip != $store_zip && Store::whereStoreZip($store_zip)->whereKeyNot($store->store_id)->whereCompanyId($this->company_id)->exists()){
            return $this->failed('编号重复');
        };

        $param['store_zip'] = $store_zip;
        $store_manager_id = $request->post('store_manager_id');
        if($store->store_manager_id != $store_manager_id){
            $param['store_manager_id'] = $store_manager_id;
            Employ::whereId($store->store_manager_id)->update(['store_id' => null,'shop_id' => null]);
        }
        $store->update($param);
        return $this->message('修改成功');
    }

    /**
     * 门店添加
     * @param Request $request
     * @return mixed
     */
    public function storesCreate(Request $request)
    {
        $store = new Store();
        $store->store_name = $request->post('store_name');
        $store->store_phone = $request->post('store_phone');
        $store->store_address = $request->post('store_address');
        $store->area_info = $request->post('area_info');
        $store->store_manager_id = $request->post('store_manager_id');
        $store->company_id = $this->company_id;
        $store->store_photo = $request->post('store_photo');
        $store->store_description = $request->post('store_description');

        $store_zip = $request->post('store_zip','');
        if(empty($store_zip) || Store::whereCompanyId($this->company_id)->whereStoreZip($store_zip)->exists()){
            $store_zip = Uuid::generate()->string;
        }

        $store->store_zip = $store_zip;
        $store->save();

        Employ::whereId($store->store_manager_id)->update(['shop_id' => $store->id]);
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
        $role_id = Role::wherePreinstallRole($this->shoper)->whereCompanyId($this->company_id)->value('id');
        $employ_store_mamages = Employ::whereRoleId($role_id)->whereStatus(Employ::STATUS_NORMAL)->select('id','name')->get();

        $data = array(
            'employ_store_mamages' => $employ_store_mamages
        );
        return $this->success($data);
    }

    /**
     * 店员管理展示
     * @param Request $request
     * @return mixed
     */
    public function storeShopping(Request $request)
    {
        $guides = ShoppingGuide::whereCompanyId($this->company_id)->select('sg_id','sg_name')->select();
        $store_guides_id = ShoppingGuide::whereCompanyId($this->company_id)->whereStoreId($request->post('store_id'))->pluck('sg_id');

        $data = array(
            'guides' => $guides,
            'store_guides_id' => $store_guides_id
        );
        return $this->success($data);
    }

    /**
     * 店员修改
     * @param Request $request
     */
    public function storeShoppingUpdate(Request $request)
    {
        $store_id = $request->post('store_id');
        $shop_guide_ids = $request->post('shop_guide_ids');
        $store_guides_id = ShoppingGuide::whereCompanyId($this->company_id)->whereStoreId()->pluck('sg_id');

        ShoppingGuide::whereCompanyId($this->company_id)->whereIn('sg_id',explode(',',$store_guides_id))->update(['store_id' => 0]);
        ShoppingGuide::whereCompanyId($this->company_id)->whereIn('sg_id',explode(',',$shop_guide_ids))->update(['store_id' => $store_id]);
        return $this->message('修改成功');
    }


}
