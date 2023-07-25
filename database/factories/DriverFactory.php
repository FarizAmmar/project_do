<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Composer Faker
        $faker = Faker::create('id_ID');

        return [
            'driver_GUID' => fake()->uuid(),
            'driver_sname' => explode(' ', $faker->name())[0],
            'driver_lname' => fake()->name(),
            // 'driver_KTP' => $faker->nik(),
            // 'driver_email' => fake()->email(),
            // 'driver_stnk' => $faker->numerify('### #### ##'),
            'driver_phone' => '0' . substr($faker->e164PhoneNumber, 3)
        ];
    }
}
