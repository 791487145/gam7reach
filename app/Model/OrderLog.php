<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:51:17 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Model\OrderLog
 *
 * @property int $log_id 主键
 * @property int $order_id 订单id
 * @property string|null $log_msg 文字描述
 * @property int $log_time 处理时间
 * @property string $log_role 操作角色
 * @property string|null $log_user 操作人
 * @property string|null $log_orderstate 订单状态：0(已取消)10:未付款;20:已付款;30:已发货;40:已收货;
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogOrderstate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereLogUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OrderLog whereOrderId($value)
 * @mixin \Eloquent
 */
class OrderLog extends Eloquent
{
	protected $table = '7r_order_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'log_time' => 'int'
	];

	protected $fillable = [
		'order_id',
		'log_msg',
		'log_time',
		'log_role',
		'log_user',
		'log_orderstate'
	];
}
