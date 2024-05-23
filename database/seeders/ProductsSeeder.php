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
            'image_url' => '/Img/Productes/laptopHP.jpg',
            'category_id' => 2,
            'state_id' => 1,
            'marca_id' => 2
        ]);
        Products::create([
            'name' => 'Samsung Galaxy A10s A107M',
            'description' => 'Samsung Galaxy A10s A107M - 32GB, 6.2" HD+ Infinity-V Display, 13MP+2MP Dual Rear +8MP Front Cameras, GSM Unlocked Smartphone - Blue',
            'price' => 500,
            'stock' => 10,
            'image_url' => '/Img/Productes/samsung-galaxy-a10.jpg',
            'category_id' => 3,
            'state_id' => 1,
            'marca_id' => 1


        ]);
        Products::create([
            'name' => 'Tablet Samsung Galaxy Tab A',
            'description' => 'Tablet Samsung Galaxy Tab A 8.0" 32 GB Wifi Android 9.0 Pie SM-T290 (2019) - Black',
            'price' => 300,
            'stock' => 10,
            'image_url' => '/Img/Productes/samsung-galaxy-tab-A.jpg',
            'category_id' => 4,
            'state_id' => 1,
            'marca_id' => 1

        ]);
        Products::create([
            'name' => 'Monitor HP 24mh FHD Monitor',
            'description' => 'Computer Monitor - 23.8" Full HD Monitor (1920 x 1080p) - IPS Panel and Built-in Audio - VESA Compatible 24m',
            'price' => 200,
            'stock' => 10,
            'image_url' => '/Img/Productes/91TylD88mTL._AC_UF894,1000_QL80_.jpg',
            'category_id' => 5,
            'state_id' => 1,
            'marca_id' => 2

        ]);
        Products::create([
            'name' => 'Logitech MK270 Wireless Keyboard and Mouse Combo',
            'description' => 'Logitech MK270 Wireless Keyboard and Mouse Combo - Keyboard and Mouse Included, 2.4GHz Dropout-Free Connection, Long Battery Life',
            'price' => 50,
            'stock' => 10,
            'image_url' => '/Img/Productes/61pUul1oDlL._AC_UF894,1000_QL80_.jpg',
            'category_id' => 5,
            'state_id' => 1,
            'marca_id' => 1

        ]);
        Products::create([
            'name' => 'AMD Ryzen 5 3600 6-Core',
            'description' => 'AMD Ryzen 5 3600 6-Core, 12-Thread Unlocked Desktop Processor with Wraith Stealth Cooler',
            'price' => 200,
            'stock' => 10,
            'image_url' => '/Img/Productes/81b75EQJrgL.__AC_SX300_SY300_QL70_ML2_.jpg',
            'category_id' => 6,
            'state_id' => 1,
            'marca_id' => 1

        ]);
        Products::create(
            [
                'name' => 'HP Pavilion Gaming Desktop Computer',
                'description' => 'HP Pavilion Gaming Desktop Computer, AMD Ryzen 5 3500 Processor, NVIDIA GeForce GTX 1650 4 GB, 8 GB RAM, 512 GB SSD, Windows 10 Home (TG01-0030, Black)',
                'price' => 800,
                'stock' => 10,
                'image_url' => '/Img/Productes/363-hp-pavilion-gaming-desktop-tg01-2065ns-amd-ryzen-5-5600g-16gb-1tb-512gb-ssd-rtx-3060-review.png',
                'category_id' => 1,
                'state_id' => 1,
                'marca_id' => 2
            ]
        );

        Products::create(
            [
                'name' => 'HP 15 Laptop',
                'description' => 'HP 15 Laptop, 11th Gen Intel Core i5-1135G7 Processor, 8 GB RAM, 256 GB SSD Storage, 15.6” Full HD IPS Display, Windows 10 Home, HP Fast Charge, Lightweight Design (15-dy2021nr, 2020)',
                'price' => 600,
                'stock' => 10,
                'image_url' => '/Img/Productes/con-nb-otto-23c1-laptop-15-fc0000-product-image.png',
                'category_id' => 2,
                'state_id' => 1,
                'marca_id' => 2

            ]
        );

        Products::create(
            [
                'name' => 'MSI GeForce RTX 4060 VENTUS 2X BLACK OC 8GB GDDR6 DLSS3',
                'description' => 'Juega, transmite, crea. La GeForce RTX™ 4060 te permite disfrutar de los últimos juegos y aplicaciones con la arquitectura ultraeficiente NVIDIA Ada Lovelace. Experimente juegos inmersivos acelerados por IA con ray tracing y DLSS 3, y potencie su proceso creativo y productividad con NVIDIA Studio.',
                'price' => 299,
                'stock' => 100,
                'image_url' => '/Img/Productes/61q0rsE3ezL._AC_SX522_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );

        Products::create(
            [
                'name' => 'MSI MPG B550 GAMING PLUS ',
                'description' => 'La serie MPG saca lo mejor de los jugadores al permitir una expresión completa en color con control avanzado de iluminación RGB y sincronización. Experimente en otro nivel de personalización con una tira de LED frontal que proporciona notificaciones convenientes en el juego y en tiempo real. Con la serie MPG, transforme su equipo en el centro de atención y las mejores tablas de clasificación con estilo.',
                'price' => 129,
                'stock' => 100,
                'image_url' => '/Img/Productes/616TKsdlL2L._AC_SX522_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );

        Products::create(
            [
                'name' => 'MSI PRO B650M-P',
                'description' => 'La MSI PRO B650M-P está diseñada con toneladas de herramientas flexibles con versión de memoria DDR5.',
                'price' => 109,
                'stock' => 100,
                'image_url' => '/Img/Productes/81iWXnNMelL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );

        Products::create(
            [
                'name' => 'MSI MAG A650BN 650W 80 Plus Bronze',
                'description' => 'MAG A650BN proporciona a los jugadores una opción de fuente de alimentación básica segura, confiable y eficiente.',
                'price' => 49,
                'stock' => 100,
                'image_url' => '/Img/Productes/81eLlIQ5PsL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );
        Products::create(
            [
                'name' => 'MSI GeForce RTX 3060 VENTUS 2X OC LHR 12GB GDDR6',
                'description' => 'RTX.  IT’S ON. Disfruta de los mayores éxitos de ventas de hoy como nunca antes con la fidelidad visual del trazado de rayos en tiempo real y el rendimiento definitivo de DLSS con tecnología de IA.',
                'price' => 309,
                'stock' => 100,
                'image_url' => '/Img/Productes/71tduSp8ooL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );
        Products::create(
            [
                'name' => 'MSI X670E GAMING PLUS WIFI',
                'description' => 'MSI X670E GAMING PLUS WIFI está diseñado con toneladas de conectividad, herramientas flexibles y una conveniente solución Wi-Fi con versión de memoria DDR5 para jugadores que quieren todo.',
                'price' => 249,
                'stock' => 100,
                'image_url' => '/Img/Productes/81UgzLBvNLL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );
        Products::create(
            [
                'name' => 'MSI GeForce RTX 4080 SUPER GAMING X SLIM 16GB GDDR6X DLSS3',
                'description' => 'Para juegos ultrarrealistas, ultrafluidos y ultrainmersivos, la tarjeta gráfica MSI GeForce RTX 4080 SUPER 16G GAMING X SLIM te ofrece las tecnologías más avanzadas para que puedas jugar en las mejores condiciones, en muy alta resolución o en Realidad Virtual.',
                'price' => 1099,
                'stock' => 100,
                'image_url' => '/Img/Productes/1462-msi-geforce-rtx-4080-super-gaming-x-slim-16gb-gddr6x-dlss3.png',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );
        Products::create(
            [
                'name' => 'MSI MAG CORELIQUID M360 ARGB Kit de Refrigeración Líquida 360mm Negro',
                'description' => 'La serie MAG lucha junto a los jugadores en busca del honor. Con elementos añadidos de inspiración militar en estos productos de juego, renacieron como símbolo de robustez y durabilidad.',
                'price' => 109,
                'stock' => 100,
                'image_url' => '/Img/Productes/199-msi-mag-coreliquid-m360-argb-kit-de-refrigeracion-liquida-360mm-negro.png',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );
        Products::create(
            [
                'name' => 'MSI GeForce RTX 4070 SUPER VENTUS 2X WHITE OC 12GB GDDR6X DLSS3',
                'description' => 'Prepárate para jugar y crear con potencia con NVIDIA® GeForce RTX™ 4070 SUPER. Está construido con la arquitectura ultraeficiente NVIDIA Ada Lovelace. Experimente el trazado de rayos súper rápido, el rendimiento acelerado por IA con DLSS 3, nuevas formas de crear y mucho más.',
                'price' => 659,
                'stock' => 100,
                'image_url' => '/Img/Productes/1114-msi-geforce-rtx-4070-super-ventus-2x-white-oc-12gb-gddr6x-dlss3.png',
                'category_id' => 6,
                'state_id' => 1,
                'marca_id' => 1

            ]
        );


    }
}
