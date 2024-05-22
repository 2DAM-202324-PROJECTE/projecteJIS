<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Products;
use App\Services\CartService;
use Livewire\Component;

class CreditCard extends Component
{
    public $totalMesIvaEnviament;
    public $cardNumber;
    public $cvv;
    public $cardHolder;
    public $month;
    public $year;
    public function render()
    {
        // Obté les dades del carro
        $this->content = Cart::content();

        $this->totalMesIvaEnviament = app(CartService::class)->totalMesIvaMesEnviament();
        return view('livewire.credit-card');
    }

    public function confirmPago()
    {
        // Verifica les dades de la targeta
        if (strlen($this->cardNumber) !== 16 || strlen($this->cvv) !== 3 || strlen($this->cardHolder) === 0){

            return;
        }
        // Get an instance of CartService
        $cartService = app(CartService::class);

        // Obtén los contenidos del carrito
        $cartContents = $cartService->getContent();
        // Para cada producto en el carrito
        foreach ($cartContents as $cartItem) {
            // Busca el producto en la base de datos
            $product = Products::find($cartItem['id']);

            // Resta la cantidad del producto en el carrito de la cantidad en la base de datos
            $product->stock -= $cartItem['quantity'];

            // Guarda el producto actualizado en la base de datos
            $product->save();
        }

        // Una vegada validat, es buida el carro
        Cart::clear();

        return redirect()->route('order-confirmed');
    }


}
