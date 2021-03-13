<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\User;
use App\Models\Community;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'community_id',
        'user_id',
        'status'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
