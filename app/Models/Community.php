<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function getCommunityPostAttribute() {
    //     return $this->
    // }
}
