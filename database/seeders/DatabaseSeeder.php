<?php

namespace Database\Seeders;

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
        \DB::table('users')->insert([
            [
                "id" => 1000,
                "name" => 123,
                "password" => 123,

            ],
            [
                "id" => 1001,
                "name" => 234,
                "password" => 234,

            ]
        ]);
        \DB::table('money')->insert([
            [
                "user_id" => 1000,
                "money" => 1000,
            ],
            [
                "user_id" => 1001,
                "money" => 1000,

            ]
        ]);
    }
}
