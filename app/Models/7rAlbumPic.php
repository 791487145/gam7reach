<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 13 Nov 2018 03:00:26 +0000.
 */

namespace App\Models;

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
 *
 * @package App\Models
 */
class 7rAlbumPic extends Eloquent
{
	protected $table = '7r_album_pic';
	protected $primaryKey = 'apic_id';
	public $timestamps = false;

	protected $casts = [
		'aclass_id' => 'int',
		'apic_size' => 'int',
		'upload_time' => 'int'
	];

	protected $fillable = [
		'apic_name',
		'apic_tag',
		'aclass_id',
		'apic_cover',
		'apic_size',
		'apic_spec',
		'upload_time'
	];
}
