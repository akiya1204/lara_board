<?php

use Illuminate\Database\Seeder;

class CategorytableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'ctg_id' => 1,
                'category_name' => 'ゲーム本体',
            ],
            [
                'ctg_id' => 2,
                'category_name' => 'ゲームソフト',
            ],
            [
                'ctg_id' => 3,
                'category_name' => '周辺機器',
            ],
        ]);
    }
}
