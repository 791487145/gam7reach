<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 09:28:16 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\RefundReturn
 *
 * @property int $refund_id 记录ID
 * @property int $company_id 企业id
 * @property int $order_id 订单ID
 * @property string $order_sn 订单编号
 * @property string $refund_sn 申请编号
 * @property int|null $store_id 云店ID
 * @property string|null $store_name 云店名称
 * @property int|null $shop_id 旗舰店id
 * @property string|null $shop_name 旗舰店名称
 * @property int $ is_service 客服介入0未介入；1已介入
 * @property int $buyer_id 买家ID
 * @property string $buyer_name 买家会员名
 * @property float|null $refund_amount 退款金额
 * @property bool|null $refund_type 申请类型:1为退款,2为退货,默认为1
 * @property bool|null $refund_state 处理状态:1为待审核,2为同意,3为不同意,默认为1
 * @property bool|null $return_type 退货类型:1为不用退货,2为需要退货,默认为1
 * @property bool|null $order_lock 订单锁定类型:1为不用锁定,2为需要锁定,默认为1
 * @property bool|null $shipping_state 物流状态:1为待发货,2为待收货,3为未收到,4为已收货,默认为1
 * @property int $add_time 添加时间
 * @property int|null $seller_time 卖家处理时间
 * @property int|null $reason_id 原因ID:0为其它
 * @property string|null $reason_info 原因内容
 * @property string|null $pic_info 图片
 * @property string|null $buyer_message 申请原因
 * @property string|null $seller_message 卖家备注
 * @property bool|null $express_id 物流公司编号
 * @property string|null $invoice_no 物流单号
 * @property int|null $ship_time 发货时间,默认为0
 * @property int|null $delay_time 收货延迟时间,默认为0
 * @property int|null $receive_time 收货时间,默认为0
 * @property string|null $receive_message 收货备注
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereBuyerMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereBuyerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereDelayTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereExpressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereIsService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereOrderLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn wherePicInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereReasonInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereReceiveMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereReceiveTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereRefundAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereRefundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereRefundSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereRefundState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereRefundType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereReturnType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereSellerMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereSellerTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereShipTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereShippingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\RefundReturn whereStoreName($value)
 * @mixin \Eloquent
 */
class RefundReturn extends Eloquent
{
	protected $table = '7r_refund_return';
	protected $primaryKey = 'refund_id';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'order_id' => 'int',
		'store_id' => 'int',
		'shop_id' => 'int',
		' is_service' => 'int',
		'buyer_id' => 'int',
		'refund_amount' => 'float',
		'refund_type' => 'bool',
		'refund_state' => 'bool',
		'return_type' => 'bool',
		'order_lock' => 'bool',
		'shipping_state' => 'bool',
		'add_time' => 'int',
		'seller_time' => 'int',
		'reason_id' => 'int',
		'express_id' => 'bool',
		'ship_time' => 'int',
		'delay_time' => 'int',
		'receive_time' => 'int'
	];

	protected $fillable = [
		'company_id',
		'order_id',
		'order_sn',
		'refund_sn',
		'store_id',
		'store_name',
		'shop_id',
		'shop_name',
		' is_service',
		'buyer_id',
		'buyer_name',
		'refund_amount',
		'refund_type',
		'refund_state',
		'return_type',
		'order_lock',
		'shipping_state',
		'add_time',
		'seller_time',
		'reason_id',
		'reason_info',
		'pic_info',
		'buyer_message',
		'seller_message',
		'express_id',
		'invoice_no',
		'ship_time',
		'delay_time',
		'receive_time',
		'receive_message'
	];
}
