<?php

namespace App\Modules\Company\Http\Controllers;

use App\Http\Controllers\BaiscController;
use App\Model\Menus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MenuController extends BaiscController
{
    /**
     * c菜单列表
     * @param Request $request
     * @return mixed
     */
    public function menuShow(Request $request)
    {
        $menus = Menus::withDepth()->having('depth', '<', 3)->defaultOrder()->get()->toTree();
        return $this->success($menus);
    }

    /**
     * 菜单创建
     * @param Request $request
     * @return mixed
     */
    public function menuCreate(Request $request)
    {
        $parent_id = $request->post('parent_id',0);
        $menu = Menus::whereId($parent_id)->first();
        $param = $request->only('name','url','title');

        if(is_null($menu)){
            $node = new Menus($param);
            $node->saveAsRoot();
        }else{
            $menu->children()->create($param);
        }

        return $this->created('创建成功');
    }

    /**
     * 菜单修改
     * @param Request $request
     * @return mixed
     */
    public function menuUpdate(Request $request)
    {
        $param = $request->only('name','url','title');
        $menu = Menus::whereId($request->post('parent_id'))->first();
        $menu->update($param);
        return $this->message('修改成功');
    }

    /**
     * 菜单删除
     * @param Request $request
     * @return mixed
     */
    public function menuDelete(Request $request)
    {
        $menu = Menus::whereId($request->post('menu_id'))->first();
        $menu->delete();
        return $this->message('删除成功');
    }

    /**
     * 升降
     * @param Request $request
     * @return mixed
     */
    public function upOrDown(Request $request)
    {
        $num = $request->post('num',1);
        $action = $request->post('action','up');
        $menu = Menus::whereId($request->post('menu_id'))->first();
        if($action == 'up'){
            $menu->up($num);
        }else{
            $menu->down($num);
        }
       return $this->message('操作成功');
    }

    /**
     * 菜单恢复
     * @param Request $request
     * @return mixed
     */
    public function resorts(Request $request)
    {
        $menu = Menus::whereId($request->post('menu_id'))->onlyTrashed()->first();
        $menu->restore();
        return $this->message('操作成功');
    }

}
