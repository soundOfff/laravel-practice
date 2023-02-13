<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
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
        Category::truncate();

        User::factory(5)->create();
        User::factory(1)->create([
            "name" => 'admin',
            "email" => 'admin@gmail.com',
            "password" => bcrypt('admin'),
            "username" => 'admin',
            'isAdmin' => 1,
        ]);
        Category::factory(5)->create();
    }
}
