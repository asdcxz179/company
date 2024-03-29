<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RouteSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PointsSeeder::class);
        $this->call(SystemSettingsSeeder::class);
        $this->call(ProductsTypeSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
