<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property int $upload_id
 * @property string $path
 * @property Carbon $created_at
 * @property int $size
 * 
 * @property Upload $upload
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';
	public $timestamps = false;

	protected $casts = [
		'upload_id' => 'int',
		'size' => 'int'
	];

	protected $fillable = [
		'upload_id',
		'path',
		'size'
	];

	public function upload()
	{
		return $this->belongsTo(Upload::class);
	}
}
