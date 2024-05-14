<?php


namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
class ProductDetailsComponent extends Component
{
    public $product;
    public $products;
    public $quantity = 1; // En aquest cas, la quantitat sempre és 1, ja que aquí no hi ha opció de posar mès d'una unitat alhora.
    public $image_url;

    public function mount($id)
    {
        $this->product = Products::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.product-details-component');
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
}
