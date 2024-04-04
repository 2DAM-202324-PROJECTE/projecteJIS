<?php

namespace Tests\Feature\Livewire\Products;

use App\Http\Controllers\Admin\Products\AddProducts;
use App\Http\Controllers\Products\Index as ProductsIndex;
use App\Livewire\FormAddProducts;
use App\Models\Products;
use Livewire\Livewire;
use Tests\TestCase;

class CreateProductsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ProductsIndex::class)
            ->assertStatus(200);
    }
//    /** @test */
//    public function component_exists_on_the_page_for_creation()
//    {
//        $this->get('/addProducts')
//            ->assertSeeLivewire(AddProducts::class);
//    }

    /** @test */
    public function show_empty_form_for_creation()
    {
        Livewire::test(FormAddProducts::class)
            ->assertViewHas('name', '');
    }
}
