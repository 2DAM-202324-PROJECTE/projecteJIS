<?php

 namespace App\Http\Controllers\Products;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $quantity;

    protected $listeners = [
        'categorySelected' => 'loadProducts',
    ];
    public function mount(): void
    {
        $this->quantity = 1;
    }
    public function render()
    {
        return view('products.index',);
    }

}
