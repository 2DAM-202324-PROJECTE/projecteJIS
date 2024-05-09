<?php

namespace App\Http\Controllers\Admin\Products;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Http\Request;
use Livewire\Component;

class ModifyProducts extends Component
{
    public $productId;
    public $product;
    public $categories;
    public $estat;
    public $marques;

    protected $listeners = ['loadDataProduct'];

    public function mount(){
        $this->categories = Category::all();

    }

    // Amb la id que hem passat al mètode anterior i amb la ruta llegim les dades del producte de la id seleccionada.
    public function loadDataProduct($id)
    {
        $this->productId = $id;
        $this->product = Products::find($id);
        $this->categories = Category::all();
        $this->estat = State::all();
        $this->marques = Marques::all();


        // Retornem la vista amb les dades del producte seleccionat.
        return view('admin.products.modify-products', [
            'product' => $this->product,
            'categories' => $this->categories,
            'estat' => $this->estat,
            'marques' => $this->marques
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $this->product = Products::find($id);
        if (!$this->product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $this->product->name = $request->input('name');
        $this->product->description = $request->input('description');
        $this->product->price = $request->input('price');
        $this->product->stock = $request->input('stock');
        $this->product->category_id = $request->input('category_id');
        $this->product->state_id = $request->input('state_id');
        $this->product->marca_id = $request->input('marca_id');
        $this->product->image_url = $request->input('image_url');
        $this->product->save();

        return redirect()->route('panelProducts')->with('success', 'Product updated successfully');
    }



//    public function render()
//    {
//        return view('livewire.modify-products', [
//            'product' => $this->product
//        ]);
//    }
}
