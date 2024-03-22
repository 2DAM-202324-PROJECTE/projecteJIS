<?php

namespace App\Http\Controllers\Category;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('category.index');
    }
}
