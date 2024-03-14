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
    public $productName;
    public $productPrice;

    protected $listeners = ['openProductModal'];


    public function render()
    {
        return view('livewire.taula-productes');
    }
    public function mount()
    {
        $this->quantity = 1;

        $this->loadProducts();

    }

    // Funció per carregar els productes, depenent dels parametres passats, ja siguin del header, d'algun filtre...
    public function loadProducts()
    {

        $selectedCategoryId = session('selected_category');
        $searchParam = session('searchParam');
        // en cas de que hi hagi una categoria seleccionada, farà un select de la categoria seleccionada
        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId); //Fa select de la categoria seleccionada
            $this->products = $category->products;
        }
        // en cas de que hi hagi un parametre de cerca, farà un select dels productes
        // que continguin el parametre de cerca
        if ($searchParam){
            $products = Products::where('name', 'LIKE', "%$searchParam%")->get();
            $this->products = $products;
        }

        else {
            $this->products = Products::all();
        }
    }

    public function addToCart(): void
    {
        $product = $this->products->first(); // Obtén el primer producto de la colección

        if ($product) {
            // Agrega la cantidad como cuarto argumento
            Cart::add($product->id, $product->name, $product->price, $this->quantity);
            $this->dispatch('productAddedToCart');
        }
    }



    public function openProductModal($productName, $productPrice): void
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;

        $this->dispatch('openProductModal', $productName, $productPrice);
    }




}
