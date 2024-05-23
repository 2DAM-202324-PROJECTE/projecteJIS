<?php

namespace App\Http\Controllers\Admin\Products;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ModifyProducts extends Component
{
    public $productId;
    public $product;
    public $categories;
    public $estat;
    public $marques;
    public $image;
    public $metode;
    protected $listeners = ['loadDataProduct'];

    public function mount(){
        $this->categories = Category::all();

    }

    // Amb la id que hem passat al mètode anterior i amb la ruta llegim les dades del producte de la id seleccionada.
    public function loadDataProduct($metode, $id)
    {
        $this->metode = $metode;
        $this->productId = $id;
        $this->product = Products::find($id);
        $this->categories = Category::all();
        $this->estat = State::all();
        $this->marques = Marques::all();
        $this->image = $this->product->image_url;



        // Retornem la vista amb les dades del producte seleccionat.
        return view('admin.products.modify-products', [
            'metode' => $this->metode, // 'edit' o 'details, depenent del valor del métode, la vista fara una cosa o un altra. En aquest cas que els camps siguin modificables o no
            'product' => $this->product,
            'categories' => $this->categories,
            'estat' => $this->estat,
            'marques' => $this->marques
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Obtener la ruta de la imagen del producto
            $oldImagePath = public_path($product->image_url);

            // Verificar si la imagen existe
            if (File::exists($oldImagePath)) {
                // Eliminar la imagen
                File::delete($oldImagePath);
            }

            // Guardar la nueva imagen en storage/app/Img
            $imageName = $request->file('image')->store('Img', 'public');

            // Mover la nueva imagen a public/Img
            $imagePath = storage_path("app/public/$imageName");
            $publicImagePath = public_path("Img/Productes/{$request->file('image')->getClientOriginalName()}");
            File::move($imagePath, $publicImagePath);

            $imageUrl = asset("Img/Productes/{$request->file('image')->getClientOriginalName()}");
            $imageUrl = str_replace(url('/'), '', $imageUrl);

            // Actualizar la imagen del producto
            $product->image_url = $imageUrl;
        }

        // Actualizar los datos del producto
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        $product->state_id = $request->input('state_id');
        $product->marca_id = $request->input('marca_id');
        $product->save();

        return redirect()->route('panelProducts')->with('success', 'Product updated successfully');
    }


//    public function render()
//    {
//        return view('livewire.modify-products', [
//            'product' => $this->product
//        ]);
//    }
}
