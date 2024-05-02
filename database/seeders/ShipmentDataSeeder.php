<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ShipmentData;

class ShipmentDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('email', 'admin4@test.net')->first();
        ShipmentData::create([
            'user_id' => $adminUser->id,
            'name' => 'Admin Name',
            'email' => 'admin4@test.net',
            'address' => '123 Main St',
            'city' => 'Admin City',
            'state' => 'Admin State',
            'postal_code' => '12345',
            'country' => 'ESP',
        ]);
    }
}
