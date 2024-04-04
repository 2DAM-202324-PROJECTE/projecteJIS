<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Welcome extends Component
{
    public $products;
    public $selectedCategory;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.welcome', compact('categories'));
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        // Asigna el valor de la categoría seleccionada a la variable de sesión
        Session::put('selected_category', $categoryId);
        // Muestra los productos de la categoría seleccionada
        return redirect()->to('/products')->with('selected_category', $categoryId);
    }




}
