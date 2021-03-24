<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use App\Models\Tag;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['owner_id'])
            ->using(CommunityOwner::class);
    }

    public function owner()
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['members']);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tags()
    {
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // public function getCommunityPostAttribute() {
    //     return $this->
    // }
}
