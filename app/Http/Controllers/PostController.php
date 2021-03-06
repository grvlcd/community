<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Community;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function store(PostRequest $request, Community $community)
    {
        $user = $request->user();
        $post = $user->posts()->create([
            'post' => $request->post,
            'community_id' => $community->id,
            'status' => 'new',
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $image_canvas = Image::canvas(1200, 740, '#000000');
                $img = $image->store('posts', 'images');
                $image_resize = Image::make(storage_path('app/public/images/' . $img))->resize(1200, 740, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_canvas->insert($image_resize, 'center');
                $image_canvas->save(storage_path('app/public/images/' . $img));
                $post->images()->create([
                    'path' => 'posts/' . $image_resize->basename,
                ]);
            }
        }
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
        if ($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $image_canvas = Image::canvas(1200, 740, '#000000');
                $img = $image->store('posts', 'images');
                $image_resize = Image::make(storage_path('app/public/images/' . $img))->resize(1200, 740, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_canvas->insert($image_resize, 'center');
                $image_canvas->save(storage_path('app/public/images/' . $img));
                $post->images()->create([
                    'path' => 'posts/' . $image_resize->basename,
                ]);
            }
        }
        return redirect()->route('posts.show', $post)->withSuccess('Post is up to date!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if ($post->images != null) {
            foreach ($post->images as $image) {
                Storage::disk('images')->delete($image->path);
                $image->delete();
            }
        }
        $post->delete();
        return redirect()->route('home')->withSuccess("Your post has been deleted!");
    }
}
