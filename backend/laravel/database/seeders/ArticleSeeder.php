<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public $count = 8;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= $this->count; $i++) {
            DB::table('articles')->insert([
                'user_id'    => mt_rand(1, 2),
                'title'      => '記事タイトルだよ_'.$i,
                'summary'    => 'ここに記事要約が入ります。',
                'content'    => 'ここに内容のサンプルが入ります。ここに内容のサンプルが入ります。ここに内容のサンプルが入ります。ここに内容のサンプルが入ります。',
                'public'     => true
            ]);
        }
    }
}
