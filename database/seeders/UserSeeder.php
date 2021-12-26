<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "user1",
            'email' => 'user@user1.com',
            'password' => bcrypt('password'),
            'description' => 'this is user description',
            'profile_img' => "image/blank_profile.png",
        ]);

        DB::table('users')->insert([
            'username' => "user2",
            'email' => 'user@user2.com',
            'password' => bcrypt('password'),
            'description' => 'this is user description',
            'profile_img' => "image/blank_profile.png",
        ]);
    }
}
