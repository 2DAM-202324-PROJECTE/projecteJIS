<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public function render()
    {
        return view('livewire.checkoutComponent');
    }

    public function paymentRedirect()
    {
        return redirect()->route('payment');
    }
}
