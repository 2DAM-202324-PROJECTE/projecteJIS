<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Services\CartService;
use Livewire\Component;

class OrderConfirmedComponent extends Component
{
    public $total;
    public $calculIva;
    public $totalMesIvaEnviament;
    public $enviament;
    public $content;

    public function render()
    {
        // Obté les dades del carro
        $this->content = Cart::content();

        $this->total = app(CartService::class)->total();
        $this->calculIva = app(CartService::class)->Iva();
        $this->totalMesIvaEnviament = app(CartService::class)->totalMesIvaMesEnviament();
        $this->enviament = app(CartService::class)->enviamentString();

        return view('livewire.order-confirmed-component');
    }


}
