<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $casts = [
        'avatar' => 'int',
        'is_active' => 'bool',
        'name_updated_at' => 'datetime'
    ];

    protected $hidden = [
        'password',
        'token'
    ];

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'avatar',
        'gender',
        'role',
        'token',
        'is_active',
        'name_updated_at'
    ];

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'avatar');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
