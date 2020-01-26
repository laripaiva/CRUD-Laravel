<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        // ]);

        // DB::table('movies')->insert([
        //     'title' => Str::random(10),
        //     'description' => Str::random(10),
        // ]);

        DB::table('movie_user')->insert([
            'user_id' => 1,
            'movie_id' => 2,
        ]);
    }
}
