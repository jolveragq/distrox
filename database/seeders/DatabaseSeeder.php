<?php

namespace Database\Seeders;

use App\Domain\Models\Company;
use App\Domain\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Company::factory()->create([
            'ruc' => '1234567890',
            'name' => 'Test Company',
            'legal_name' => 'Test Company Ltd.',
            'fiscal_address' => 'Test Street 123, Test City, Test State, 12345',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
