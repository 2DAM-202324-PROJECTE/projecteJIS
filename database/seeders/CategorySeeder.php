<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name_category' => 'Torres',
            'category_description' => 'Ideal per a jugar i treballar a casa.',
            'category_image' => '/Img/Categories/torre.jpg'
        ]);
        Category::create([
            'name_category' => 'Portàtils',
            'category_description' => 'Ideal per a usar-lo a qualsevol lloc.',
            'category_image' => '/Img/Categories/portatil.jpg',

        ]);
        Category::create([
            'name_category' => 'Smartphones',
            'category_description' => 'Necessari en el nostre dia a dia.',
            'category_image' => '/Img/Categories/smartphone.jpg'

        ]);
        Category::create([
            'name_category' => 'Tablets',
            'category_description' => 'Ideal per a veure pel·lícules i sèries.',
            'category_image' => '/Img/Categories/tablet.jpg'
        ]);
        Category::create([
            'name_category' => 'Perifèrics',
            'category_description' => 'Tot el que necessites per al teu ordinador.',
            'category_image' => '/Img/Categories/periferics.jpg'
        ]);
        Category::create([
            'name_category' => 'Components',
            'category_description' => 'Tot el que necessites per muntar el teu ordinador.',
            'category_image' => '/Img/Categories/components.jpg'

        ]);
    }
}

