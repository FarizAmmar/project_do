<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Driver;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Unit
        Unit::factory(20)->create();

        // Driver
        Driver::factory(20)->create();

        User::create([
            'name' => 'root',
            'username' => 'root',
            'email' => 'root@gmail.com',
            'password' => bcrypt('root'),
            'access' => 'admin',
        ]);

        User::create([
            'name' => 'aisyah',
            'username' => 'aisyah',
            'email' => 'aisyah@gmail.com',
            'password' => bcrypt('123'),
            'access' => 'marketing',
        ]);

    }
}
