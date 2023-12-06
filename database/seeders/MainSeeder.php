<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use ProductSeeder;
use UserSeeder;

class MainSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
    }
}