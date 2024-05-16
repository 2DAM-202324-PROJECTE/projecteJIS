<?php

namespace App\Livewire;

use App\Facades\Cart;
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

        // Una vegada validat, es buida el carro
        Cart::clear();

        return redirect()->route('order-confirmed');
    }


}
