<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'JavaScript'],
            ['name' => 'PHP'],
            ['name' => 'Ruby'],
            ['name' => 'Go'],
            ['name' => 'Rust'],
        ];

        foreach($tags as $tag) {
            DB::table('tags')->insert($tag);
        }
    }
}
