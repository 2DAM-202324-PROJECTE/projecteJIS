<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use Illuminate\Support\Facades\Session; // Importa la clase Session

class TaulaProductes extends Component
{
    public $products;
    public $quantity;
    public $minPrice;
    public $maxPrice;
    public $image_url;

    protected $listeners = ['filtersApplied'];

    public function render()
    {
        return view('livewire.taula-productes', [
            'searchParam' => session('searchParam'),
            'selectedCategory' => session('selected_category'),
        ]);
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

        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId);
            $productsQuery = $category->products()->where('state_id', '!=', 2);

            if ($this->minPrice) {
                $productsQuery->where('price', '>=', $this->minPrice);
            }

            if ($this->maxPrice) {
                $productsQuery->where('price', '<=', $this->maxPrice);
            }

            $this->products = $productsQuery->get();

            Session::forget('selected_category');

        } else if ($searchParam) {
            $products = Products::where('name', 'LIKE', "%$searchParam%")
                ->where('state_id', '!=', 2)
                ->get();

            $this->products = $products;

            Session::forget('searchParam');
        } else{
            $products = Products::where('state_id', '!=', 2)->get();
            $this->products = $products;
        }
    }


    public function addToCart($productId): void
    {
        // Busca el producte amb l'id passat per paràmetre a la vista taula-productes
        $product = Products::findOrFail($productId);
        if ($product) {
            // Afegeix el producte al carret
            Cart::add($product->id, $product->name, $product->price, $this->quantity, $product->image_url);
            $this->dispatch('productAddedToCart');
        }
    }

    public function filtersApplied($filters)
    {
        $this->minPrice = $filters['minPrice'];
        $this->maxPrice = $filters['maxPrice'];
        $this->loadProducts();
    }



}
