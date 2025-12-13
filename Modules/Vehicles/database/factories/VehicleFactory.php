<?php

namespace Modules\Vehicles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Vehicles\Models\Vehicle;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [];
    }
}
