<?php

namespace Database\Seeders;

use App\Models\Ballon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BallonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ballon::factory(10)->create();
    }
}
