<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        $categories = Category::factory(50)->create()->each(function ($category){
            Image::factory()->create(['imageable_type' => "App\Models\Category", 'imageable_id'=>$category->id]);
        });
        $tags = Tag::factory(100)->create();
        Post::factory(2000)->create()->each(function ($post) use ($tags, $categories) {
            $post->tags()->attach($tags->random(rand(3, 10)));
            $post->categories()->attach($categories->random(rand(1, 5)));
            Image::factory()->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
        });
    }
}
