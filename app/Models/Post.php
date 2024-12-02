<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $description
 * @property string $keywords
 * @property int|null $avatar
 * @property string $status
 * @property Carbon|null $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Upload|null $upload
 * @property User|null $user
 * @property Collection|Category[] $categories
 * @property Collection|Comment[] $comments
 * @property PinnedPost $pinned_post
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'user_id' => 'int',
		'avatar' => 'int',
		'published_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'title',
		'slug',
		'content',
		'description',
		'keywords',
		'avatar',
		'status',
		'published_at'
	];

	public function upload()
	{
		return $this->belongsTo(Upload::class, 'avatar');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function pinned_post()
	{
		return $this->hasOne(PinnedPost::class);
	}
}
