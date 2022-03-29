<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [ 'id' => 1, 'code' => "email", 'name' => '郵件系統', 'default_fee' => 0.01, 'status' => 1, 'created_at' => Carbon::now()],
            [ 'id' => 2, 'code' => "sms", 'name' => '簡訊系統', 'default_fee' => 0.02, 'status' => 1, 'created_at' => Carbon::now()],
	    ]);
    }
}
