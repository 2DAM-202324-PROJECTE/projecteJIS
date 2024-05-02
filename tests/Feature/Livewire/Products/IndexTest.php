<?php

namespace Tests\Feature\Livewire\Products;

use App\Http\Controllers\Products\Index as ProductsIndex;
use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * Class IndexTest
 *
 * This class contains unit tests for the Products Index page.
 *
 * @package Tests\Feature\Livewire\Products
 */
class IndexTest extends TestCase
{
    /**
     * Test to ensure the Products Index page renders successfully.
     * @test
     * @return void
     */
    public function renders_successfully()
    {
        Livewire::test(ProductsIndex::class)
            ->assertStatus(200);
    }

    /**
     * Test to ensure the Products Index component exists on the page.
     * @test
     * @return void
     */
    public function component_exists_on_the_page()
    {
        $this->get('/products')
            ->assertSeeLivewire(ProductsIndex::class);
    }

    /**
     * Test to ensure the Products Index page displays 2 product names.
     * @test
     * @return void
     */
    public function displays_2_product_names()
    {
        $products = Products::factory()->count(2)->create();
        $names = $products->pluck('name');
        $test = Livewire::test(ProductsIndex::class);
        foreach ($names as $name) {
            $test->assertSee($name);
        }
    }

    /**
     * Test to ensure the Products Index page shows no products when none are available.
     * @test
     * @return void
     */
    public function it_shows_no_products_when_none_are_available()
    {
        Livewire::test(ProductsIndex::class)
            ->assertSee('No products available');
    }

    /**
     * Test to ensure the Products Index page does not show product names when none are available.
     * @test
     * @return void
     */
    public function it_does_not_show_product_names_when_none_are_available()
    {
        Livewire::test(ProductsIndex::class)
            ->assertDontSee('name');
    }

    /**
     * Test to ensure the Products Index page displays more than two product names.
     * @test
     * @return void
     */
    public function it_displays_more_than_two_product_names()
    {
        $products = Products::factory()->count(3)->create();
        $names = $products->pluck('name');
        $test = Livewire::test(ProductsIndex::class);
        foreach ($names as $name) {
            $test->assertSee($name);
        }
    }

    /**
     * Test to ensure the Products Index page does not display unavailable product names.
     * @test
     * @return void
     */
    public function it_does_not_display_unavailable_product_names()
    {
        $products = Products::factory()->state(['available' => false])->count(2)->create();
        $names = $products->pluck('name');
        $test = Livewire::test(ProductsIndex::class);
        foreach ($names as $name) {
            $test->assertDontSee($name);
        }
    }

}
