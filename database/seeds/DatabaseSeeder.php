<?php

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
        // $this->call(UserSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(CategorytableSeeder::class);
        $this->call(ItemtableSeeder::class);
        $this->call(PostCategoriesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
