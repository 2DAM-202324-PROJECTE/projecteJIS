<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class FiltresProductes extends Component
{
    public $minPrice;
    public $maxPrice;

    public function render()
    {
        return view('livewire.filtres-productes');
    }

    public function applyFilters(): void
    {
        $this->dispatch('filtersApplied', [
            'minPrice' => $this->minPrice,
            'maxPrice' => $this->maxPrice,
        ]);
    }
}
