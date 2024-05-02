<?php

namespace App\Livewire;

use App\Models\Marques;
use Livewire\Component;

class LogoClouds extends Component
{
    public function render()
    {
        $marques = Marques::all();


        return view('livewire.logoClouds', compact( 'marques'));
    }
}
