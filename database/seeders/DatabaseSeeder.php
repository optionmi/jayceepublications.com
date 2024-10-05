<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create the admin user or fetch it if it already exists
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@jayceepublications.com'], // Search condition
            [ // Data to be used if creating a new user
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $this->command->info('Admin user created or already exists.');

        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign the admin role to the admin user
        if (!$adminUser->roles()->where('role_id', $adminRole->id)->exists()) {
            $adminUser->roles()->attach($adminRole);
            $this->command->info('Admin role assigned to admin user.');
        } else {
            $this->command->info('Admin user already has the admin role.');
        }
    }
}
