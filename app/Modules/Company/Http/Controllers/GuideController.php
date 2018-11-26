<?php

namespace App\Modules\Company\Http\Controllers;

use App\Exports\GuideExport;
use App\Http\Controllers\BaiscController;
use App\Model\Area;
use App\Model\Company;
use App\Model\ShoppingGuide;
use App\Model\Store;
use Illuminate\Http\Request;
use Cache;

class GuideController extends BaiscController
{

    public function guides(Request $request)
    {
        $stores = Store::whereCompanyId($this->company_id)->select('store_id','store_name')->get();

        $shop_guides = new ShoppingGuide();
        $shop_guides = $shop_guides->whereCompanyId($this->company_id);

        $param = $request->only('sg_name','store_id');
        if(!empty($param['store_id'])){
            $shop_guides = $shop_guides->whereStoreId($param['store_id']);
        }
        if(!empty($param['sg_name'])){
            $shop_guides = $shop_guides->where('sg_name','like','%'.$param['sg_name'].'%');
        }

        $shop_guides = $shop_guides->forPage($request->post('page',1),$request->post('limit',self::LIMIT))
                    ->select('sg_id','sg_name','store_id')->get();

        foreach ($shop_guides as $shop_guide){
            $store = $shop_guide->store;
            $shop_guide->store_name = $store->store_name;
            $shop_guide->store_photo = $store->store_photo;
            $shop_guide->regision_mamage = $store->regision_manage->name;
        }

        $data = array(
            'shop_guides' => $shop_guides,
            'stores' => $stores,
            'count' => count($shop_guides)
        );
        return $this->success($data);
    }

    public function guideUpdateShow(Request $request)
    {
        $shop_guide = ShoppingGuide::whereSgId($request->post('sg_id'))->first();
        $stores = Store::whereCompanyId($this->company_id)->select('store_id','store_name')->get();

        $data = array(
            '$shop_guide' => $shop_guide,
            '$stores' => $stores
        );
        return $this->success($data);
    }

    public function guideUpdate(Request $request)
    {
        $shop_guide = ShoppingGuide::whereSgId($request->post('sg_id'))->first();
        $param = array(
            'sg_name' => $request->post('sg_name'),
            'store_id' => $request->post('store_id')
        );
        $shop_guide->update($param);
        return $this->message('修改成功');
    }

    public function guideExport(Request $request,GuideExport $guideExport)
    {
        $param = array(
            'store_id' => $request->post('store_id',''),
            'sg_name' => $request->post('sg_name',''),
            'company_id' => $request->post('company_id',1)
        );
        return $guideExport->withParam($param);
    }

}
