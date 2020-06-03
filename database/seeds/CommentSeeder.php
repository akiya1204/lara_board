<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 1,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 1,
                'user_id' => 1,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 2,
                'user_id' => 2,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 4,
                'user_id' => 4,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 4,
                'user_id' => 20,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 6,
                'user_id' => 13,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 27,
                'user_id' => 2,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 27,
                'user_id' => 3,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 24,
                'user_id' => 2,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 22,
                'user_id' => 2,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 22,
                'user_id' => 6,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 19,
                'user_id' => 10,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 15,
                'user_id' => 13,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 12,
                'user_id' => 13,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 10,
                'user_id' => 1,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 8,
                'user_id' => 8,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 3,
                'user_id' => 4,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 9,
                'user_id' => 10,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
            [
                'post_id' => 20,
                'user_id' => 2,
                'body' => 'コメントです。',
                'delete_flg' => 0,
                'created_at' => '2020-06-01 12:00:00',
                'updated_at' => '2020-06-01 12:00:00',
            ],
        ]);
    }
}
