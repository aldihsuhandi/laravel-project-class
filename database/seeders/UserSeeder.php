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
            'password' => bcrypt('pwd'),
            'description' => 'this is user description',
            'profile_img' => "",
        ]);
    }
}
