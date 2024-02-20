<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // L'ordre d'execució dels seeders és important, primer s'han de crear
        // les dades a on se faràn referéncia, i després les dades que fan referéncia a aquestes.
        $this->call([CategorySeeder::class, StateSeeder::class,
            ProductsSeeder::class, UserSeeder::class]);
    }
}
