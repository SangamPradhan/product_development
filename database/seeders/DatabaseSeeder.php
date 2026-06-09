<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed additional user details (admin/staff) and roles
        $this->call(UserDetailsSeeder::class);

        // Seed sample projects for the frontend
        $this->call(ProjectSeeder::class);

        // Seed sample services with short_description
        $this->call(ServiceSeeder::class);
    }
}
