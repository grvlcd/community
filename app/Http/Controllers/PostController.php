<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(PostRequest $request, Community $community)
    {
        $user = $request->user();
        $user->posts()->create([
            'post' => $request->post,
            'community_id' => $community->id,
            'status' => 'new',
        ]);
        return redirect()->route('communities.show', $community);
    }

    public function show(Post $post)
    {
        $post->comments;
        return view('posts.show')->with(['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->validated());
        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('home');
    }
}
