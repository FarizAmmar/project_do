<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_GUID' => fake()->uuid(),
            'unit_code' => "UNT-" . fake()->unique()->randomNumber(4),
            'unit_type' => fake()->randomElement(['Sedan', 'SUV', 'Hatchback', 'Convertible', 'Coupe']),
            'unit_condition' => fake()->randomElement(['new', 'used']),
            'unit_VIN' => fake()->unique()->regexify('[A-HJ-NPR-Z0-9]{17}'),
            'unit_LICENSE' => fake()->unique()->regexify('[A-Z0-9]{3}-[A-Z0-9]{2}-[A-Z0-9]{3}'),
            'unit_LICENSE_type' => fake()->randomElement(['prvt', 'plsk', 'smnt']),
            'unit_color' => fake()->colorName(),
            'unit_RegYear' => fake()->year()
        ];
    }
}
