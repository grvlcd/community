<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Image;
use App\Models\Post;
use App\Models\Community;
use App\Models\Tag;
use App\Models\Reply;
use App\Models\Like;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create()
            ->each(function ($user) {
                $image = Image::factory()->user()->make();
                $user->image()->save($image);
            });

        $communities = Community::factory()->count(10)->create()
            ->each(function ($community) {
                $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');
                $community->users()->attach($users, ['members' => $users->count(), 'owner_id' => $users->random()]);
                $tags = Tag::factory(mt_rand(1, 3))->make();
                $community->tags()->saveMany($tags);
            });

        $posts = Post::factory()->count(50)->make()
            ->each(function ($post) use ($users, $communities) {
                $post->user_id = $users->random()->id;
                $post->community_id = $communities->random()->id;
                $tags = Tag::factory(mt_rand(1, 3))->make();
                $images = Image::factory(mt_rand(2, 4))->make();
                $post->save();
                Like::factory()->count(mt_rand(0, 3))->make()
                    ->each(function ($like) use ($post) {
                        $user = User::inRandomOrder()->take(1)->pluck('id');
                        $like->user_id = $user[0];
                        $like->post_id = $post->id;
                        $like->save();
                    });
                $post->images()->saveMany($images);
                $post->tags()->saveMany($tags);
            });

        $comments = Comment::factory()->count(200)->make()
            ->each(function ($comment) use ($users, $posts) {
                $comment->user_id = $users->random()->id;
                $comment->post_id = $posts->random()->id;
                $comment->save();
            });

        $replies = Reply::factory()->count(50)->make()
            ->each(function ($reply) use ($comments, $users) {
                $reply->user_id = $users->random()->id;
                $reply->comment_id = $comments->random()->id;
                $reply->save();
            });
    }
}
