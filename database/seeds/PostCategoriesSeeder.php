<?php

use Illuminate\Database\Seeder;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_Categories')->insert([
            [
                'ctg_id' => 1,
                'category_name' => 'ゲームソフト',
            ],
            [
                'ctg_id' => 2,
                'category_name' => 'ゲーム機材',
            ],
            [
                'ctg_id' => 3,
                'category_name' => 'その他',
            ],
        ]);
    }
}
