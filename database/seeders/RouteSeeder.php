<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            [ 'id' => 100, 'name' => 'PRODUCT', 'parent_id' => 11, 'link' => NULL, 'icon' => "zmdi zmdi-shopping-cart", 'apilink' => NULL, 'seq' => 2, 'status' => 1, 'created_at' => Carbon::now()],
            [ 'id' => 101, 'name' => 'PRODUCT_MANAGE', 'parent_id' => 100, 'link' => "Admin.Products.index", 'icon' => NULL, 'apilink' => NULL, 'seq' => 2, 'status' => 1, 'created_at' => Carbon::now()],
	    ]);
    }
}
