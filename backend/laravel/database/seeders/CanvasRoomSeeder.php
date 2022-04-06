<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanvasRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('canvas_rooms')->insert([
            'user_id' => 1,
            'name' => 'canvas_1'
        ]);

        DB::table('canvas_rooms')->insert([
            'user_id' => 1,
            'name' => 'canvas_2'
        ]);
    }
}
