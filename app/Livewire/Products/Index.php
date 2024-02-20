<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public $productes;
    public function mount()
    {
        $this->productes = Products::all();
    }
    public function render()
    {
        return view('livewire.products.index');
    }
}
