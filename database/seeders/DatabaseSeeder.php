<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // clear db
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        $user = User::factory()->create([
            // 'name' => 'Petar Petrevski',
            // 'username' => 'petarpetrevski'
        ]);

        Post::factory(10)->create([
            // 'user_id' => $user->id
        ]);


        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $hobbies = Category::create([
        //     'name' => 'Hobbies',
        //     'slug' => 'hobbies'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'First Personal Post',
        //     'slug' => 'first-personal-post',
        //     'excerpt' => '<p>Example excerpt for post.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, eaque voluptatibus molestias veniam architecto dolorum veritatis rerum officia, magnam eligendi commodi culpa voluptate quis autem sequi nobis quos, nisi temporibus. Eveniet ipsa dolores dolorem vitae adipisci quis odio neque? Sapiente explicabo omnis iste ratione a voluptas totam itaque illum quia! Suscipit facilis, quidem aperiam esse aliquam, rerum nemo repudiandae sunt id quae praesentium soluta iste explicabo dolor fuga ducimus excepturi provident fugiat maxime ut. Cum, optio vel repellendus expedita officiis nesciunt architecto maiores sint accusantium, labore inventore. Accusamus facere odit tenetur quaerat consequuntur perferendis officia saepe magni, nihil officiis minus eos eum voluptatem sit placeat voluptates optio eaque repellendus. Quibusdam ipsum ducimus similique commodi fugit? Corrupti asperiores explicabo assumenda dicta!</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'First Work Post',
        //     'slug' => 'first-work-post',
        //     'excerpt' => '<p>Example excerpt for post.</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, eaque voluptatibus molestias veniam architecto dolorum veritatis rerum officia, magnam eligendi commodi culpa voluptate quis autem sequi nobis quos, nisi temporibus. Eveniet ipsa dolores dolorem vitae adipisci quis odio neque? Sapiente explicabo omnis iste ratione a voluptas totam itaque illum quia! Suscipit facilis, quidem aperiam esse aliquam, rerum nemo repudiandae sunt id quae praesentium soluta iste explicabo dolor fuga ducimus excepturi provident fugiat maxime ut. Cum, optio vel repellendus expedita officiis nesciunt architecto maiores sint accusantium, labore inventore. Accusamus facere odit tenetur quaerat consequuntur perferendis officia saepe magni, nihil officiis minus eos eum voluptatem sit placeat voluptates optio eaque repellendus. Quibusdam ipsum ducimus similique commodi fugit? Corrupti asperiores explicabo assumenda dicta!</p>'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
