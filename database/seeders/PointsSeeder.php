<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            [ 'id' => 15, 'name' => 'MEMBER_POINT_RECORD', 'parent_id' => 11, 'link' => "Admin.PointRecords.index", 'icon' => NULL, 'apilink' => NULL, 'seq' => 2, 'status' => 1, 'created_at' => Carbon::now()],
	    ]);
    }
}
