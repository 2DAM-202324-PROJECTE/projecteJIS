<?php

namespace Tests\Feature\Livewire\Products;

use App\Http\Controllers\Products\Index as ProductsIndex;
use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ProductsIndex::class)
            ->assertStatus(200);
    }
    /** @test */
    public function component_exists_on_the_page()
    {
        $this->get('/products')
            ->assertSeeLivewire(ProductsIndex::class);
    }

    /** @test */
    public function displays_2_product_names()
    {
        $products = Products::factory()->count(2)->create();
        $names = $products->pluck('name');
        $test = Livewire::test(ProductsIndex::class);
        foreach ($names as $name) {
            $test->assertSee($name);
        }
    }

//    /** @test */
//    public function sends_2_products_to_view()
//    {
//        Products::factory()->count(2)->create();
//        Livewire::test(ProductsIndex::class)->assertViewHas('products', function
//        ($products) {
//            return count($products) == 2;
//        });
//    }
}
