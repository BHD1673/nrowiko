<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User|null $user
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function posts()
	{
		return $this->belongsToMany(Post::class);
	}
}
