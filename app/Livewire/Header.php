<?php

namespace App\Livewire;

use App\Models\Category;
use App\Services\CartService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Http\Request;

class Header extends Component
{
    public $selectedCategory;
    public $products;
    public $categoryImages;
    public $totalProductesCarro; // Necesitas definir esta propiedad para utilizarla

    public function render()
    {
        $categories = Category::all();
        $this->totalProductesCarro = app(CartService::class)->QuantityTotalCart(); // Obtenemos la cantidad de productos en el carrito

        return view('livewire.header', compact('categories'));
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        // Asigna el valor de la categoría seleccionada a la variable de sesión
        Session::put('selected_category', $categoryId);
        // Muestra los productos de la categoría seleccionada
        return redirect()->to('/products');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:2', // Validación para asegurar que la consulta tiene al menos dos caracteres
        ]);
        // Asigna el valor de la consulta a la variable de sesión
        Session::put('searchParam', $request->input('query'));

        return redirect()->to('/products');
    }
}
