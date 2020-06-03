<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run() { DB::table('users')->insert([
        [
            'name'           => 'ユーザー１',
            'email'          => 'test1@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー２',
            'email'          => 'test2@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー３',
            'email'          => 'test3@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー４',
            'email'          => 'test4@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー５',
            'email'          => 'test5@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー６',
            'email'          => 'test6@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー７',
            'email'          => 'test7@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー８',
            'email'          => 'test8@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー９',
            'email'          => 'test9@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１０',
            'email'          => 'test10@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１１',
            'email'          => 'test11@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１２',
            'email'          => 'test12@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１３',
            'email'          => 'test13@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１４',
            'email'          => 'test14@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１５',
            'email'          => 'test15@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１６',
            'email'          => 'test16@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１７',
            'email'          => 'test17@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１８',
            'email'          => 'test18@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー１９',
            'email'          => 'test19@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'ユーザー２０',
            'email'          => 'test20@example.com',
            'password'       => Hash::make('password'),
            'role' => 'customer',
        ],
        [
            'name'           => 'オーナー',
            'email'          => 'owner@example.com',
            'password'       => Hash::make('password'),
            'role' => 'owner',
        ],
    ]);
}
}
