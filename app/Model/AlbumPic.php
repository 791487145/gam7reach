<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Nov 2018 01:24:08 +0000.
 */

namespace App\Model;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 7rAlbumPic
 *
 * @property int $apic_id
 * @property string $apic_name
 * @property string $apic_tag
 * @property int $aclass_id
 * @property string $apic_cover
 * @property int $apic_size
 * @property string $apic_spec
 * @property int $upload_time
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereAclassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereApicCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereApicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereApicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereApicTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\AlbumPic whereUploadTime($value)
 * @mixin \Eloquent
 */
class AlbumPic extends Eloquent
{
	protected $table = '7r_album_pic';
	protected $primaryKey = 'apic_id';
	public $timestamps = false;

	protected $casts = [
		'aclass_id' => 'int',
		'upload_time' => 'int'
	];

	protected $fillable = [
		'apic_name',
		'apic_tag',
		'aclass_id',
		'apic_cover',
		'upload_time'
	];
}
