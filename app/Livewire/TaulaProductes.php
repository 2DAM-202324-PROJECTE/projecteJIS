<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class TaulaProductes extends Component
{
    public $products;
    public $quantity;


    public function render()
    {
        return view('livewire.taula-productes');
    }
    public function mount()
    {
        $this->quantity = 1;

        $this->loadProducts();

    }

    // Funció per carregar els productes, depenent dels paràmetres passats, ja siguin del header, d'algun filtre...
    public function loadProducts()
    {

        $selectedCategoryId = session('selected_category');
        $searchParam = session('searchParam');
        // en caso de que haya una categoria seleccionada, hará un select de la categoria seleccionada
        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId);
            $products = $category->products()->where('state_id', '!=', 2)->get(); // Excluir productos con state_id = 2
            $this->products = $products;
        }
        // en caso que haya un parámetro de búsqueda, hará un select de los productos que contengan el parámetro de búsqueda
        else if ($searchParam) {
            $products = Products::where('name', 'LIKE', "%$searchParam%")
                ->where('state_id', '!=', 2) // Excluir productos con state_id = 2
                ->get();
            $this->products = $products;
        }
        // en caso contrario, cargará todos los productos
        else {
            $products = Products::where('state_id', '!=', 2)->get(); // Excluir productos con state_id = 2
            $this->products = $products;
        }

    }

    public function addToCart($productId): void
    {
        // Busca el producte amb l'id passat per paràmetre a la vista taula-productes
        $product = Products::findOrFail($productId);
        if ($product) {
            // Afegeix el producte al carret
            Cart::add($product->id, $product->name, $product->price, $this->quantity);
            $this->dispatch('productAddedToCart');
        }
    }


}
