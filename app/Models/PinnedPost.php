<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PinnedPost
 * 
 * @property int $id
 * @property int $post_id
 * @property string|null $pinned_by
 * @property Carbon $created_at
 * 
 * @property Post $post
 *
 * @package App\Models
 */
class PinnedPost extends Model
{
	protected $table = 'pinned_posts';
	public $timestamps = false;

	protected $casts = [
		'post_id' => 'int'
	];

	protected $fillable = [
		'post_id',
		'pinned_by'
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}
}
