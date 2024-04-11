<?php

namespace App\Livewire;

use Livewire\Component;

class FormEditCategories extends Component
{
    public function render()
    {
        return view('livewire.form-edit-categories');
    }

    public function ModifyCategories($productId)
    {

        return redirect()->route('panelCategories');
    }
}
