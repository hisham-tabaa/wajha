<?php

namespace Modules\Vehicles\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Vehicles\Models\Vehicle;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'publisher' => $this->faker->name(),
            'offer_type' => $this->faker->randomElement(['sale', 'rent']),
            'main_address' => $this->faker->address(),
            'lat' => $this->faker->latitude(),
            'lan' => $this->faker->longitude(),
            'price' => $this->faker->numberBetween(5000, 500000),
            'payment_type' => $this->faker->randomElement(['cash', 'installment']),
            'installment_years' => $this->faker->randomElement([1, 2, 3, 4]),
            'rent_type' => $this->faker->randomElement(['monthly', 'yearly']),
            'city' => $this->faker->city(),
            'brand' => $this->faker->randomElement(['Toyota', 'BMW', 'Mercedes', 'Honda', 'Ford']),
            'model' => $this->faker->word(),
            'year' => $this->faker->year(),
            'color' => $this->faker->colorName(),
            'transmission' => $this->faker->randomElement(['automatic', 'manual']),
            'fuel_type' => $this->faker->randomElement(['petrol', 'diesel', 'electric']),
            'country_of_origin' => $this->faker->country(),
            'cylinder' => $this->faker->randomElement([3, 4, 5, 6, 7, 8]),
            'insurance' => $this->faker->randomElement(['mandatory', 'optional', 'comprehensive']),
            'engine_capacity' => $this->faker->numberBetween(1000, 5000),
            'power_horses' => $this->faker->numberBetween(80, 400),
            'mileage' => $this->faker->numberBetween(0, 200000),
            'condition' => $this->faker->randomElement(['new', 'used', 'refurbished']),
            'body_type' => $this->faker->randomElement(['sedan', 'suv', 'truck', 'coupe']),
            'number_of_seats' => $this->faker->randomElement([2, 4, 5, 7]),
            'number_of_doors' => $this->faker->randomElement([2, 4]),
            'description' => $this->faker->text(500),
        ];
    }
}
