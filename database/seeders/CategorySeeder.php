<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Web Programming'
        ]);
        DB::table('categories')->insert([
            'name' => 'Mobile Programming'
        ]);
        DB::table('categories')->insert([
            'name' => 'Java Programming'
        ]);
        DB::table('categories')->insert([
            'name' => 'Flutter'
        ]);
        DB::table('categories')->insert([
            'name' => 'Other'
        ]);
    }
}
