<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public $products;
    public $selectedCategory;

    public function mount()
    {
        $this->products = Products::all();
        $this->categories = Category::all();

    }
    public function render()
    {
        $categories = Category::all();
        $products = Products::when($this->selectedCategory, function ($query) {
            $query->where('id', $this->selectedCategory);
        })->get();

        return view('livewire.products.index', compact('categories', 'products'));
    }
}
