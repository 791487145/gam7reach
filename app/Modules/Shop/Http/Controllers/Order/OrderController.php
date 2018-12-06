<?php
/**
 * Created by PhpStorm.
 * User: fengxin
 * Date: 2018/12/3
 * Time: 9:33 AM
 */
namespace  App\Modules\Shop\Http\Controllers\Order;
use App\Http\Controllers\ShopBascController;
use App\Model\ShopCart;
use App\Model\WebShop;
use App\Modules\Shop\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends ShopBascController{

    public function orderCreate(OrderRequest $request)
    {


    }

}
