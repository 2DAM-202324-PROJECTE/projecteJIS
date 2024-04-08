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
        Products::create(
            [
                'name' => 'HP 24mh FHD Monitor',
                'description' => 'HP 24mh FHD Monitor - Computer Monitor with 23.8-Inch IPS Display (1080p) - Built-In Speakers and VESA Mounting - Height/Tilt Adjustment for Ergonomic Viewing - HDMI and DisplayPort - (1D0J9AA#ABA)',
                'price' => 200,
                'stock' => 10,
                'image_url' => 'https://thumb.pccomponentes.com/w-150-150/articles/1077/10770018/1182-hp-e-series-e24-g5-238-led-ips-fullhd-75hz.jpg',
                'category_id' => 5,
                'state_id' => 1
            ]
        );
        Products::create(
            [
                'name' => 'HP 15 Laptop',
                'description' => 'HP 15 Laptop, 11th Gen Intel Core i5-1135G7 Processor, 8 GB RAM, 256 GB SSD Storage, 15.6” Full HD IPS Display, Windows 10 Home, HP Fast Charge, Lightweight Design (15-dy2021nr, 2020)',
                'price' => 600,
                'stock' => 10,
                'image_url' => 'https://thumb.pccomponentes.com/w-530-530/articles/1081/10819169/2843-hp-laptop-15-fd0036np-intel-core-i3-n305-8gb-256gb-ssd-156-pt-foto.jpg',
                'category_id' => 2,
                'state_id' => 1
            ]
        );

        Products::create([
            'name' => 'Apple iPhone 13',
            'description' => 'Apple iPhone 13 (128GB, Product)',
            'price' => 1000,
            'stock' => 10,
            'image_url' => 'https://thumb.pccomponentes.com/w-150-150/articles/57/578962/128-apple-iphone-13-128gb-blanco-estrella-libre.jpg',
            'category_id' => 3,
            'state_id' => 1
        ]);

        Products::create([
            'name' => 'Samsung Galaxy Tab S8',
            'description' => 'Samsung Galaxy Tab S8 - 11 inch Android Tablet 2022 (Latest Model)',
            'price' => 800,
            'stock' => 10,
            'image_url' => 'https://thumb.pccomponentes.com/w-150-150/articles/1051/10519758/1941-samsung-galaxy-tab-s8-ultra-5g-12-256-gb-gris.jpg',
            'category_id' => 4,
            'state_id' => 1
        ]);

        Products::create([
            'name' => 'Logitech G Pro X Superlight Wireless Gaming Mouse',
            'description' => 'Logitech G Pro X Superlight Wireless Gaming Mouse, Ultra-Lightweight, Hero 25K Sensor, 25,600 DPI, 5 Programmable Buttons, Long Battery Life, Compatible with PC/Mac - Black',
            'price' => 150,
            'stock' => 10,
            'image_url' => 'https://thumb.pccomponentes.com/w-150-150/articles/1077/10772979/1940-logitech-g-pro-x-superlight-2-lightspeed-raton-inalambrico-gaming-negro-32000-dpi-4d3fc748-2b1b-4427-b7ac-c5d90b72dbe9.jpg',
            'category_id' => 5,
            'state_id' => 1
        ]);

        Products::create([
            'name' => 'PcCom Ready Intel Core i5-12400F / 16GB / 1TB SSD / RTX 3060 + Windows 11 Home',
            'description' => 'PcCom Ready Intel Core i5-12400F / 16GB / 1TB SSD / RTX 3060 + Windows 11 Home',
            'price' => 1500,
            'stock' => 100,
            'image_url' => 'https://thumb.pccomponentes.com/w-530-530/articles/1077/10770783/1367-pccom-ready-i5-12400f-16gb-ram-1tb-ssd-rtx-3060-12gb-windows-11-pc-gaming.jpg',
            'category_id' => 1,
            'state_id' => 1
        ]);




    }
}
