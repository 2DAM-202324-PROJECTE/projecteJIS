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
            'category_image' => 'https://t4.ftcdn.net/jpg/06/14/37/93/360_F_614379331_yvW5zizV6FSjAitsUW4zKHXU2aJ6aFkk.jpg'
        ]);
        Category::create([
            'name_category' => 'Portàtils',
            'category_description' => 'Ideal per a usar-lo a qualsevol lloc.',
            'category_image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGFwdG9wJTIwY29kZXxlbnwwfHwwfHx8MA%3D%3D',

        ]);
        Category::create([
            'name_category' => 'Smartphones',
            'category_description' => 'Necessari en el nostre dia a dia.',
'category_image' => 'https://m-cdn.phonearena.com/images/article/64576-wide-two_1200/The-Best-Phones-to-buy-in-2024---our-top-10-list.jpg'

        ]);
        Category::create([
            'name_category' => 'Tablets',
            'category_description' => 'Ideal per a veure pel·lícules i sèries.',
            'category_image' => 'https://www.cnet.com/a/img/resize/abbcd189cd583467b6b1a78125c7c418b806d1ed/hub/2022/10/26/f011b628-3114-4e33-b146-434f13daa92f/ipad-pro-12-9-2022.jpg?auto=webp&fit=crop&height=900&width=1200'
        ]);
        Category::create([
            'name_category' => 'Perifèrics',
            'category_description' => 'Tot el que necessites per al teu ordinador.',
            'category_image' => 'https://i.ytimg.com/vi/LsUtBClzpvs/maxresdefault.jpg',
        ]);
        Category::create([
            'name_category' => 'Components',
            'category_description' => 'Tot el que necessites per muntar el teu ordinador.',
            'category_image' => 'https://www.trustedreviews.com/wp-content/uploads/sites/54/2021/03/Intel-Rocker-Lake-2-e1615908186584.jpg'

        ]);
    }
}

