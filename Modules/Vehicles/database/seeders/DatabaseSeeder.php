<?php

namespace Modules\Vehicles\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(VehiclesTableSeeder::class);
    }
}
