<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Image;
use App\Models\Post;

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

        $posts = Post::factory()->count(50)->make()
            ->each(function ($post) use ($users) {
                $post->user_id = $users->random()->id;
                $post->save();
                $image = Image::factory()->count(mt_rand(1, 5))->make();
                $post->images()->saveMany($image);
            });
    }
}
