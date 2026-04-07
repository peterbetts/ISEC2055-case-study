<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'delete customers']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'view customers',
            'delete customers',
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole($adminRole);

        $employeeRole = Role::create(['name' => 'employee']);
        $employeeRole->givePermissionTo([
            'view customers',
        ]);

        $employee = User::factory()->create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
        ]);
        $employee->assignRole($employeeRole);
    }
}
