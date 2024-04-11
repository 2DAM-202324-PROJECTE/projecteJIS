<?php

namespace App\Livewire;

use Livewire\Component;

class FormEditProducts extends Component
{

    public function render()
    {
        return view('livewire.form-edit-products');
    }

    public function modifyProduct($productId)
    {

        return redirect()->route('panelProducts');
    }
}
