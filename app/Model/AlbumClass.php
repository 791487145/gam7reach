<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:08 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAlbumClass
 *
 * @property int $aclass_id
 * @property string $aclass_name
 * @property int $store_id
 * @property int $shop_id
 * @property int $aclass_type
 * @property string $aclass_des
 * @property int $aclass_sort
 * @property string $aclass_cover
 * @property int $upload_time
 * @property bool $is_default
 * @property int $company_id
 * @package App\Models
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
