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
        // TODO, amb wire:click al botó de modificar crido aquesta funció passant-li l'id del producte

        return redirect()->route('panelProducts');
    }
}
