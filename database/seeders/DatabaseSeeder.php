<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new RolePermisionSeeder())->run();
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'mobile' => '09011641095',
            'password' => Hash::make('123456'),
        ])->assignRole('admin');
        User::factory()->count(20)->create()->each(function ($user){
            $user->assignRole('user');
        });
        $categories = Category::factory(50)->create()->each(function ($category){
            Image::factory()->create(['imageable_type' => "App\Models\Category", 'imageable_id'=>$category->id]);
        });
        $tags = Tag::factory(100)->create();
        Post::factory(200)->create()->each(function ($post) use ($tags, $categories) {
            $post->tags()->attach($tags->random(rand(3, 4)));
            $post->categories()->attach($categories->random(rand(2,5)));
            Image::factory()->create(['imageable_type' => "App\Models\Post", 'imageable_id'=>$post->id]);
        });
    }
}
