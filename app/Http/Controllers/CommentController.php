<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $user = $request->user();
        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => $user->id
        ]);
        return redirect()->back();
    }
}
