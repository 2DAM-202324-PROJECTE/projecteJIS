<?php

namespace App\Http\Controllers\States;

use App\Models\State;
use Livewire\Component;

class Index extends Component
{
    public $estats;
    public function mount()
    {
        $this->estats = State::all();
    }
    public function render()
    {
        return view('states.index');
    }
}
