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
            'image_url' => 'https://play-lh.googleusercontent.com/HUuQc4Zpl6x7fUyX-jFMmcuUbW77REw4UKl5rfhHfP4VY6ctBU1w1I_RZWsXaojFgIo',
            'category_id' => 1,
            'state_id' => 1,
        ]);
        Products::create([
            'name' => 'Samsung Galaxy A10s A107M',
            'description' => 'Samsung Galaxy A10s A107M - 32GB, 6.2" HD+ Infinity-V Display, 13MP+2MP Dual Rear +8MP Front Cameras, GSM Unlocked Smartphone - Blue',
            'price' => 500,
            'stock' => 10,
            'image_url' => 'https://play-lh.googleusercontent.com/HUuQc4Zpl6x7fUyX-jFMmcuUbW77REw4UKl5rfhHfP4VY6ctBU1w1I_RZWsXaojFgIo',
            'category_id' => 1,
            'state_id' => 1


        ]);
        Products::create([
            'name' => 'Shirt',
            'description' => 'Shirt for man',
            'price' => 50,
            'stock' => 100,
            'image_url' => 'https://play-lh.googleusercontent.com/HUuQc4Zpl6x7fUyX-jFMmcuUbW77REw4UKl5rfhHfP4VY6ctBU1w1I_RZWsXaojFgIo',
            'category_id' => 2,
            'state_id' => 1

        ]);
        Products::create([
            'name' => 'Pants',
            'description' => 'Pants for man',
            'price' => 100,
            'stock' => 112,
            'image_url' => 'https://play-lh.googleusercontent.com/HUuQc4Zpl6x7fUyX-jFMmcuUbW77REw4UKl5rfhHfP4VY6ctBU1w1I_RZWsXaojFgIo',
            'category_id' => 2,
            'state_id' => 1

        ]);
    }
}
