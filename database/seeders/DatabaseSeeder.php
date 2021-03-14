<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Image;
use App\Models\Post;
use App\Models\Community;

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
            ->each(function ($community) use ($users) {
                $users = User::inRandomOrder()->take(rand(1, 5))->pluck('id');
                $community->users()->attach($users, ['members' => $users->count()]);
            });

        $posts = Post::factory()->count(100)->make()
            ->each(function ($post) use ($users, $communities) {
                $post->user_id = $users->random()->id;
                $post->community_id = $communities->random()->id;
                $post->save();
            });

        $comments = Comment::factory()->count(200)->make()
            ->each(function ($comment) use ($users, $posts) {
                $comment->user_id = $users->random()->id;
                $comment->post_id = $posts->random()->id;
                $comment->save();
            });
    }
}
