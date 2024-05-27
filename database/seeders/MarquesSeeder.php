<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marques;

class MarquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marques::create([
            'name' => 'MSI',
            'logo_ref' => '/Img/Marques/msi.png',
        ]);
        Marques::create([
            'name' => 'HP',
            'logo_ref' => '/Img/Marques/HP.png',
        ]);

    }
}
