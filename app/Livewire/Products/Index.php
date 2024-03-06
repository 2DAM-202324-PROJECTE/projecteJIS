<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public $products;

    protected $listeners = [
        'categorySelected' => 'loadProducts',
    ];

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $selectedCategoryId = session('selected_category');
        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId); //Fa select de la categoria seleccionada
            $this->products = $category->products;
        } else {
            $this->products = Products::all();
        }
    }

    public function render()
    {
        return view('livewire.products.index',);
    }
}
