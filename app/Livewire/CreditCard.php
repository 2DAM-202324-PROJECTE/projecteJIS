<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Services\CartService;
use Livewire\Component;

class CreditCard extends Component
{
    public $totalMesIvaEnviament;
    public function render()
    {
        // Obté les dades del carro
        $this->content = Cart::content();

        $this->totalMesIvaEnviament = app(CartService::class)->totalMesIvaMesEnviament();
        return view('livewire.credit-card');
    }


}
