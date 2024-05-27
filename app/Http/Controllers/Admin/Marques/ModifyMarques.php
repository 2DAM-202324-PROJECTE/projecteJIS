<?php

namespace App\Http\Controllers\Admin\Marques;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ModifyMarques extends Component
{
    public $marcaId;
    public $marca;
    public $image;


    protected $listeners = ['loadDataMarca'];



    // Amb la id que hem passat al mètode anterior i amb la ruta llegim les dades de la marca de la id seleccionada.
    public function loadDataMarca($id)
    {
        $this->marcaId = $id;
        $this->marca = Marques::find($id);
        $this->image = $this->marca->logo_ref;



        // Retornem la vista amb les dades de la marca seleccionat.
        return view('admin.marques.modify-marques', [
            'marca' => $this->marca,

        ]);
    }

    public function updateMarca(Request $request, $id)
    {
        $marca = Marques::find($id);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Obtener la ruta de la imagen de la marca
            $oldImagePath = public_path($marca->logo_ref);

            // Verificar si la imagen existe
            if (File::exists($oldImagePath)) {
                // Eliminar la imagen
                File::delete($oldImagePath);
            }

            // Guardar la nueva imagen en storage/app/Img
            $imageName = $request->file('image')->store('Img', 'public');

            // Mover la nueva imagen a public/Img
            $imagePath = storage_path("app/public/$imageName");
            $publicImagePath = public_path("Img/Marques/{$request->file('image')->getClientOriginalName()}");
            File::move($imagePath, $publicImagePath);

            $imageUrl = asset("Img/Marques/{$request->file('image')->getClientOriginalName()}");
            $imageUrl = str_replace(url('/'), '', $imageUrl);

            // Actualizar la imagen de la marca
            $marca->logo_ref = $imageUrl;
        }


        $marca->name = $request->input('name');
        $marca->save();

        return redirect()->route('panelMarques');
    }


}
