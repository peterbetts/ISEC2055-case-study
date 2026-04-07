<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Customer::factory(10)->create()->each(function (Customer $customer) {
            $customer->rep()->associate(User::inRandomOrder()->first())->save();
        });

        $this->call([
            RolesAndPermissionSeeder::class,
            ChallengeSeeder::class,
        ]);
    }
}
