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
        $featuredProducts = Products::where('featured', true)
            ->where('state_id', '!=', 2) // Excluir productos con state_id = 2
            ->take(2)
            ->get();

        $categories = Category::whereHas('products', function ($query) {
            $query->where('state_id', '!=', 2); // Excluir productos con state_id = 2
        })
            ->get();

        return view('livewire.welcome', compact('categories', 'featuredProducts'));
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
