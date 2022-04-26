<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanvasRoomSeeder extends Seeder
{
    public $count = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= $this->count; $i++) {
            DB::table('canvas_rooms')->insert([
                'user_id'   => mt_rand(1, 2),
                'name'      => 'canvas_'.$i
            ]);
        }
    }
}
