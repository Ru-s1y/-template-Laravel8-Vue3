<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 8;
        for ($i = 1; $i <= $count; $i++) {
            DB::table('article_tag')->insert([
                'article_id' => $i,
                'tag_id'     => mt_rand(1, 7)
            ]);
        }
    }
}
