<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Welcome extends Component
{
    public $products;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.welcome', compact('categories'));
    }


}
