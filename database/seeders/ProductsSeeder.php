<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Level;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::create([
            'name' => 'Laptop HP',
            'description' => 'Laptop HP 15.6" 8GB RAM 1TB HDD Intel Core i5 10th Gen 1035G1 3.6GHz Windows 10 Home 15-dy1036nr',
            'price' => 1000,
            'stock' => 10,
            'image_url' => 'https://www.hp.com/es-es/shop/Html/Merch/Images/c08505663_1750x1285.jpg',
            'category_id' => 2,
            'state_id' => 1,
        ]);
        Products::create([
            'name' => 'Samsung Galaxy A10s A107M',
            'description' => 'Samsung Galaxy A10s A107M - 32GB, 6.2" HD+ Infinity-V Display, 13MP+2MP Dual Rear +8MP Front Cameras, GSM Unlocked Smartphone - Blue',
            'price' => 500,
            'stock' => 10,
            'image_url' => 'https://m.media-amazon.com/images/I/61OhSCY69kL._AC_UF894,1000_QL80_.jpg',
            'category_id' => 3,
            'state_id' => 1


        ]);
        Products::create([
            'name' => 'Tablet Samsung Galaxy Tab A',
            'description' => 'Tablet Samsung Galaxy Tab A 8.0" 32 GB Wifi Android 9.0 Pie SM-T290 (2019) - Black',
            'price' => 300,
            'stock' => 10,
            'image_url' => 'https://m.media-amazon.com/images/I/71jEzLfsMcL._AC_UF894,1000_QL80_.jpg',
            'category_id' => 4,
            'state_id' => 1
        ]);
        Products::create([
            'name' => 'Monitor HP 24mh FHD Monitor',
            'description' => 'Computer Monitor - 23.8" Full HD Monitor (1920 x 1080p) - IPS Panel and Built-in Audio - VESA Compatible 24m',
            'price' => 200,
            'stock' => 10,
            'image_url' => 'https://www.hp.com/es-es/shop/Html/Merch/Images/c06470666_1750x1285.jpg',
            'category_id' => 5,
            'state_id' => 1
        ]);
        Products::create([
            'name' => 'Logitech MK270 Wireless Keyboard and Mouse Combo',
            'description' => 'Logitech MK270 Wireless Keyboard and Mouse Combo - Keyboard and Mouse Included, 2.4GHz Dropout-Free Connection, Long Battery Life',
            'price' => 50,
            'stock' => 10,
            'image_url' => 'https://m.media-amazon.com/images/I/61pUul1oDlL._AC_UF894,1000_QL80_.jpg',
            'category_id' => 5,
            'state_id' => 1
        ]);
        Products::create([
            'name' => 'AMD Ryzen 5 3600 6-Core',
            'description' => 'AMD Ryzen 5 3600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler',
            'price' => 200,
            'stock' => 10,
            'image_url' => 'https://m.media-amazon.com/images/I/81b75EQJrgL.jpg',
            'category_id' => 6,
            'state_id' => 1
        ]);
        Products::create(
            [
                'name' => 'HP Pavilion Gaming Desktop Computer',
                'description' => 'HP Pavilion Gaming Desktop Computer, AMD Ryzen 5 3500 Processor, NVIDIA GeForce GTX 1650 4 GB, 8 GB RAM, 512 GB SSD, Windows 10 Home (TG01-0030, Black)',
                'price' => 800,
                'stock' => 10,
                'image_url' => 'https://www.worten.es/i/98057e589fc8dd6a67d9c583c019a8d003d435bf',
                'category_id' => 1,
                'state_id' => 2
            ]
        );


    }
}
