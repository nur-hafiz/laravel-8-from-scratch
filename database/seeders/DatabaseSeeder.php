<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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

        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' =>'Personal',
        //     'slug' =>'personal'
        // ]);

        // $family = Category::create([
        //     'name' =>'Family',
        //     'slug' =>'family'
        // ]);

        // $work = Category::create([
        //     'name' =>'Work',
        //     'slug' =>'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => 'My family excerpt',
        //     'body' => '<p>My family bodey</p>',
        // ]);

        
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My work Post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => 'My work excerpt',
        //     'body' => '<p>My work bodey</p>',
        // ]);
    }
}
