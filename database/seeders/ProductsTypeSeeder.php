<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class ProductsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_type')->insert([
            [ 'code' => 'email', 'app' => "smtp", 'name' => 'SMTP', 'created_at' => Carbon::now()],
            [ 'code' => 'email', 'app' => "mailgun", 'name' => 'Mail Gun', 'created_at' => Carbon::now()],
            [ 'code' => 'email', 'app' => "postmark", 'name' => 'Post Mark', 'created_at' => Carbon::now()],
            [ 'code' => 'email', 'app' => "ses", 'name' => 'AWS', 'created_at' => Carbon::now()],
	    ]);
    }
}
