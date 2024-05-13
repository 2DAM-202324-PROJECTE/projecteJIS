<?php

namespace App\Http\Controllers\Admin\Marques;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Http\Request;
use Livewire\Component;

class ModifyMarques extends Component
{
    public $marcaId;
    public $marca;


    protected $listeners = ['loadDataMarca'];



    // Amb la id que hem passat al mètode anterior i amb la ruta llegim les dades de la marca de la id seleccionada.
    public function loadDataMarca($id)
    {
        $this->marcaId = $id;
        $this->marca = Marques::find($id);



        // Retornem la vista amb les dades de la marca seleccionat.
        return view('admin.marques.modify-marques', [
            'marca' => $this->marca,

        ]);
    }

    public function updateMarca(Request $request, $id)
    {
        $this->marca = Marques::find($id);

        $this->marca->name = $request->input('name');
        $this->marca->logo_ref = $request->input('logo_ref');
        $this->marca->save();

        return redirect()->route('panelMarques');
    }


}
