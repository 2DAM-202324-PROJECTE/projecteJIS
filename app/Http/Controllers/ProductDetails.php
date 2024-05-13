<?php

namespace App\Http\Controllers;


use Livewire\Component;

class ProductDetails extends Component

{

    public function show($id)
    {
        return view('productDetailsView', ['id' => $id]);
    }

}
