<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create the admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@ecommerce.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('12345'), // Use bcrypt to hash passwords
                'role' => 'admin', // Assign the role directly
                'email_verified_at' => now()
            ]
        );

        // You can add additional logic here if needed

        // Save the user
        $adminUser->save();
    }
}
