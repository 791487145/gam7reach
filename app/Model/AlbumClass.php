<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:08 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * App\Model\AlbumClass
 *
 * @property int $aclass_id 相册id
 * @property string $aclass_name 相册名称
 * @property string $aclass_des 相册描述
 * @property int $aclass_sort 排序
 * @property string $aclass_cover 相册封面
 * @property int $upload_time 图片上传时间
 * @property bool $is_default 是否为默认相册,1代表默认
 * @property int $company_id 企业id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereAclassCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereAclassDes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereAclassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereAclassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereAclassSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumClass whereUploadTime($value)
 * @mixin \Eloquent
 */
class AlbumClass extends Eloquent
{
	protected $table = '7r_album_class';
	protected $primaryKey = 'aclass_id';
	public $timestamps = false;

	protected $casts = [
		'aclass_sort' => 'int',
		'upload_time' => 'int',
		'is_default' => 'bool',
		'company_id' => 'int'
	];

	protected $fillable = [
		'aclass_name',
		'aclass_des',
		'aclass_sort',
		'aclass_cover',
		'upload_time',
		'is_default',
		'company_id'
	];
}
