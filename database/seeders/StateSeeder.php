<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Level;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create([
            'name_state' => 'Disponible'
        ]);
        State::create([
            'name_state' => 'No disponible'
        ]);
    }
}
