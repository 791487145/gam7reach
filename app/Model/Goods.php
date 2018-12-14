<?php

/**
 * 商品模型
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:27 +0000.
 */

namespace App\Model;

use App\Http\Controllers\BaiscController;
use App\Model\GoodsClass;
use Carbon\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


/**
 * App\Model\Goods
 *
 * @property int $goods_id 商品id(SKU)
 * @property string|null $goods_spuno 商品条码
 * @property string $goods_name 商品名称
 * @property int|null $goods_group_id 商品分组id
 * @property string|null $goods_jingle 商品广告词（卖点）
 * @property int $company_id 企业id
 * @property int $gc_id 商品分类id
 * @property float $goods_price 商品价格
 * @property float $goods_marketprice 市场价
 * @property string $goods_serial 商品货号
 * @property string $goods_image 商品主图
 * @property int $goods_state 商品状态 0下架，1正常
 * @property int $goods_addtime 商品添加时间
 * @property int $goods_edittime 商品编辑时间
 * @property string|null $goods_body
 * @property-read \App\Model\GoodsClass $goods_class
 * @property-read \App\Model\GoodsGroup $goods_group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\GoodsImage[] $goods_images
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsEdittime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsJingle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsMarketprice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsSpuno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods whereGoodsState($value)
 * @mixin \Eloquent
 * @property-read \App\Model\ShopGood $shopGoods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\StoreGood[] $storeGoods
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Goods upShelves()
 */
class Goods extends Eloquent
{

    protected $table="7r_goods";
	protected $primaryKey = 'goods_id';
	public $timestamps = true;
    protected $dateFormat = 'U';
    const CREATED_AT = 'goods_addtime';
    const UPDATED_AT = 'goods_edittime';
    protected $casts = [
        'goods_addtime'   => 'date:Y-m-d',
        'goods_edittime'   => 'datetime:Y-m-d H:i',

    ];
	protected $fillable = [
		'goods_spuno',
		'goods_name',
		'goods_group_id',
		'goods_jingle',
		'company_id',
		'gc_id',
		'goods_price',
		'goods_marketprice',
		'goods_serial',
		'goods_image',
		'goods_state',
		'goods_addtime',
		'goods_edittime',
		'goods_body'
	];
    /**
     * 限制查询上架的商品
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpShelves($query)
    {
        return $query->where('goods_state',1);
    }

    /*
     * 商品分类
     */
	public function goods_class(){
	    return $this->hasOne(GoodsClass::class,"gc_id","gc_id");
    }
	/*
	 * 商品分组
	 */
    public function goods_group(){
        return $this->hasOne(GoodsGroup::class,'goods_group_id','goods_group_id');
    }
    /*
     * 商品图片
     */
    public function goods_images(){
        return $this->hasMany(GoodsImage::class,'goods_id','goods_id');
    }
    /*
     * 旗舰店商品
     */
    public function shopGoods(){
        return $this->hasOne(ShopGood::class,'goods_id','goods_id');
    }
    /*
     * 云店商品
     */
    public function storeGoods(){
        return $this->hasMany(StoreGood::class,'goods_id','goods_id');
    }
    /*
     * 获取商品池列表
     */
    public function getList($request,$company_id){
        $where['company_id']=$company_id;
        $goods_state=$request->input('goods_state');
        if($request->input('goods_name')){//商品名筛选
            $where['goods_name']=$request->input('goods_name');
        }
        if($request->input('goods_spuno')){//商品条形码筛选
            $where['goods_spuno']=$request->input('goods_spuno');
        }
        if($request->input('b_price')&&$request->input('e_price')){//价格区间筛选
            $where['goods_price']=array('between',array($request->input('b_price'),$request->input('e_price')));
        }
        if(isset($goods_state)){//商品状态
            $where['goods_state']=$goods_state;
        }
        if($request->input('gc_id')){//商品分类
            $where['gc_id']=$request->input('gc_id');
        }
        $list=$this->where($where)->forPage($request->input('page',1),$request->input('limit',BaiscController::LIMIT))->get();
        $list->each(function($item,$key){
            $item->goods_state=$item->goods_state?'上架':'下架';
        });
        return  $list;
    }
    /*
     * 添加商品
     */
    public function addGoods($date){
        $goods_id=0;
        //获取企业默认相册
        $albumClass=AlbumClass::where(['company_id'=>$date['company_id'],'is_default'=>1])->first();
        if($date['goods_images']){//处理商品图片
            $goods_images=explode(',',$date['goods_images']);
            $date['goods_image']=$goods_images[0];
            unset($date['goods_images']);
            $goods_id=DB::transaction(function () use($goods_images,$date,$albumClass){//开启事务
                $goods=Goods::create($date);
                $goods_id=$goods->goods_id;
                foreach ($goods_images as $image){//插入企业相册图片
                    AlbumPic::create(['apic_name'=>$image,'aclass_id'=>$albumClass->aclass_id,
                        'apic_cover'=>$image,'upload_time'=>time()]);
                    //插入商品图片表
                    GoodsImage::create(['goods_id'=>$goods->goods_id,'company_id'=>$date['company_id'],
                        'goods_image'=>$image]);
                }
                return $goods_id;
            });

        }
        return $goods_id;
    }
    /*
     * 编辑商品
     */
    public function edit($date){
        //获取企业默认相册
        $albumClass=AlbumClass::where(['company_id'=>$date['company_id'],'is_default'=>1])->first();
        if($date['goods_images']){
            $goods_images=explode(',',$date['goods_images']);
            $date['goods_image']=$goods_images[0];
            unset($date['goods_images']);
            DB::transaction(function() use ($date,$goods_images,$albumClass){
                //删除原来的商品图片
                $old_images=GoodsImage::where('goods_id',$date['goods_id'])->select('goods_image')->get();
                $old_images->each(function ($item,$key) use ($goods_images){
                    if(!in_array($item->goods_image,$goods_images)){
                        Storage::delete($item->goods_image);
                    }
                    AlbumPic::where('apic_cover',$item->goods_image)->delete();
                });
                GoodsImage::where('goods_id',$date['goods_id'])->delete();
                $this->find($date['goods_id'])->update($date);
                foreach ($goods_images as $image){
                    //插入商品图片表
                    GoodsImage::create(['goods_id'=>$date['goods_id'],'company_id'=>$date['company_id'],
                        'goods_image'=>$image]);
                }
            });
        }

    }

}
