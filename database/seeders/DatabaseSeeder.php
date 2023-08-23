<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        // Create Admin User
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
        ]);

        // Create Marites Users
        for ($i = 1; $i <= 10; $i++) {

            User::factory()->create([
                'email' => 'marites'.$i.'@email.com'
            ]);
        }

        // Create Admin Profile
        Profile::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Prado',
            'user_id' => 1,
            'role' => 1,
            'thumbnail' => '/images/cctv-profile-pic.jpg'
        ]);

        // Create Marites Profiles
        for ($i = 2; $i <= 11; $i++) {

            Profile::factory()->create([
                'user_id' => $i 
            ]);
        }
    }
}
