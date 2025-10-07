<?php

namespace Database\Seeders;

use Modules\Auth\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Required for publication
            PermissionsSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
