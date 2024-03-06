<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Http\Request;

class Header extends Component
{
    public $selectedCategory;
    public $products;

    public $categoryImages;



    public function render()
    {
        $categories = Category::all();
        return view('livewire.header', compact('categories'));
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        // Asigna el valor de la categoría seleccionada a la variable de sessió
        Session::put('selected_category', $categoryId);
        // Carga los productos de la categoría seleccionada
        return redirect()->to('/products');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:2', // Validació per a assegurar que la consulta té almenys dos caràcters
        ]);

        $query = $request->input('query');
        $products = Products::where('name', 'LIKE', "%$query%")->get();

        return view('livewire.products.index', compact('products'));
    }
}
