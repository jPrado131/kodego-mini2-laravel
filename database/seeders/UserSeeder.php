<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Create Admin User
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
        ]);

        // Create Admin Profile
        Profile::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Prado',
            'user_id' => 1,
            'role' => 1,
            'thumbnail' => '/images/dont-delete/default/default-pro-pic.jpg'
        ]);


        // Create Admin User
        User::factory()->create([
            'name' => 'admin2',
            'email' => 'admin2@email.com',
        ]);

        // Create Admin Profile
        Profile::factory()->create([
            'first_name' => 'Daisy',
            'last_name' => 'Imbing',
            'user_id' => 2,
            'role' => 1,
            'thumbnail' => '/images/dont-delete/seeder-data/users/marites0.jpg'
        ]);


        // Create Marites Users
        for ($i = 1; $i <= 5; $i++) {

            User::factory()->create([
                'name' => 'marites'.$i,
                'email' => 'marites'.$i.'@email.com'
            ]);
        }

        // Create Marites Profiles
        for ($i = 3; $i <= 7; $i++) {

            Profile::factory()->create([
                'user_id' => $i,
                'thumbnail' => '/images/dont-delete/seeder-data/users/marites'.($i - 2).'.jpg'
            ]);
        }
    }
}
