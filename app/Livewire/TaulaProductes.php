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
        // en cas de que hi hagi una categoria seleccionada, farà un select de la categoria seleccionada
        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId); //Fa select de la categoria seleccionada
            $this->products = $category->products;
        }
        // en cas que hi hagi un paràmetre de cerca, farà un select dels productes
        // que continguin el paràmetre de cerca
        if ($searchParam){
            $products = Products::where('name', 'LIKE', "%$searchParam%")->get();
            $this->products = $products;
        }

        else {
            $this->products = Products::all();
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
