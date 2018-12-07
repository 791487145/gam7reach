<?php

namespace App\Modules\Shop\Requests;

use App\Model\ShopCart;
use App\Model\ShopGood;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_id'     => ['required', Rule::exists('7r_m_address', 'address_id')->where('member_id', auth('member')->id())],
            'cart_id'          => [
                'required',
                function ($attribute, $value, $fail) {
                    foreach (explode(',',$value) as $val){
                        if(!$shop_cart = ShopCart::whereCartId($val)->first()){
                            $fail('该购物车参数不正确');
                            return;
                        }
                        if($shop_cart->shop_id != $this->shop_id){
                            $fail('该购物车参数不正确');
                            return;
                        }
                        if($shop_cart->buyer_id != auth('member')->id()){
                            $fail('该购物车参数不正确');
                            return;
                        }
                        if (!$shop_good = ShopGood::whereShopId($this->shop_id)->whereGoodsId($shop_cart->goods_id)->whereCompanyId(auth('member')->user()->company_id)->first()) {
                            $fail('该商品不存在');
                            return;
                        }
                        if (!$shop_good->goods_state == ShopGood::GOOD_STATE_DOWN) {
                            $fail('该商品未上架');
                            return;
                        }
                        if ($shop_good->goods_state == ShopGood::GOOD_STATE_SALE_OUT) {
                            $fail('该商品已售完');
                            return;
                        }
                        if ($shop_good->goods_storage < $shop_cart->goods_num) {
                            $fail('该商品数量不足');
                            return;
                        }
                    }
                },
            ],
        ];

    }

    public function messages()
    {
        return [
            'address_id.required' => '请填写地址id',
            'address_id.exists' => '地址不存在',
            'cart_id.required' => '请填写购物车id'
        ];
    }
}
