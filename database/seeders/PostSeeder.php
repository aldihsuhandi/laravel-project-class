<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // this is for testing purposes
        for ($i = 0; $i < 20; ++$i) {
            DB::table('posts')->insert([
                "category_id" => 1,
                "user_id" => rand(1, 2),
                "title" => "test post" . $i,
                "description" => "test description",
                "created_at" => Carbon::now()->toDateTimeString(),
                "updated_at" => Carbon::now()->toDateTimeString(),
            ]);
        };
    }
}
