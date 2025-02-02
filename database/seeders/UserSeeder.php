<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@mail.com',
            'role' => 'user',
        ]);

        
        User::factory()->create([
            'name' => 'Pilot1',
            'email' => 'pilot1@mail.com',
            'role' => 'pilot',
        ]);

        
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin0@mail.com',
            'role' => 'admin',
        ]);
    }
}