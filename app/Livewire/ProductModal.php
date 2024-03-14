<?php

namespace App\Livewire;

use Livewire\Component;

class ProductModal extends Component
{
    public $productName;
    public $productPrice;

    public function render()
    {
        return view('livewire.product-modal');
    }
}
