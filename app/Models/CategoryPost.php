<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryPost
 * 
 * @property int $post_id
 * @property int $category_id
 * 
 * @property Post $post
 * @property Category $category
 *
 * @package App\Models
 */
class CategoryPost extends Model
{
	protected $table = 'category_post';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'post_id' => 'int',
		'category_id' => 'int'
	];

	public function post()
	{
		return $this->belongsTo(Post::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
