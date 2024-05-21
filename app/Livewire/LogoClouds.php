<?php

namespace App\Livewire;

use App\Models\Marques;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoClouds extends Component
{
    public $selectedBrand;

    public function render()
    {
        $marques = Marques::all();


        return view('livewire.logoClouds', compact( 'marques'));
    }

    public function selectBrand($brandId)
    {
        $this->selectedBrand = $brandId;
        // Assigna el valor de la marca seleccionada a la variable de sessió
        Session::put('selected_brand', $brandId);

        Session::forget('selected_category');
        Session::forget('searchParam');
        // Mostra els productes de la marca seleccionada
        return redirect()->to('/products');
    }
}
