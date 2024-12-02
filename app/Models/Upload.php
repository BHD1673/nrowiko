<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Upload
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $type
 * @property Carbon $created_at
 * 
 * @property User $user
 * @property Collection|File[] $files
 * @property Collection|Post[] $posts
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Upload extends Model
{
	protected $table = 'uploads';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'type'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function files()
	{
		return $this->hasMany(File::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class, 'avatar');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'avatar');
	}
}
