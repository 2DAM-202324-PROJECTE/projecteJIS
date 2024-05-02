<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use App\Models\State;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormAddProducts extends Component
{
    use WithFileUploads;

    public $image;
    public $products;
    public $categories;
    public $estat;
    public $marca;
    public $productsColumns;

    public $name;
    public $description;
    public $price;
    public $stock;

    public $image_url;
    public $category_id;
    public $state_id;
    public $marca_id;

    public $selectedProductId;




    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:1',
    ];
    public function render()
    {
        return view('livewire.form-add-products');
    }


    public function mount()
    {
        $this->loadProducts();
        $this->categories = Category::all();
        $this->estat = State::all();
        $this->marca = Marques::all();

    }

    public function loadProducts()
    {
        $this->products = Products::all();
    }


    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required',
            'state_id' => 'required',
            'marca_id' => 'required',
            'image' => 'required|image', // Validación de la imagen
        ]);

        // Obtener todos los IDs de productos existentes
        $existingIds = Products::pluck('id')->toArray();

        // Encontrar el menor ID disponible que sea mayor que 0
        $nextId = 1;
        while (in_array($nextId, $existingIds)) {
            $nextId++;
        }

        // Guardar la imagen en storage/app/Img
        $imageName = $this->image->store('Img', 'public');

        // Mover la imagen a public/Img
        $imagePath = storage_path("app/public/$imageName");
        $publicImagePath = public_path("Img/Productes/{$this->image->getClientOriginalName()}");
        File::move($imagePath, $publicImagePath);

        $imageUrl = asset("Img/Productes/{$this->image->getClientOriginalName()}");
        $imageUrl = str_replace(url('/'), '', $imageUrl);

        Products::create([
            'id' => $nextId, // Asignar el próximo ID disponible
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image_url' => $imageUrl,
            'category_id' => $this->category_id,
            'state_id' => $this->state_id,
            'marca_id' => $this->marca_id,
        ]);

        $this->reset(['name', 'description', 'price', 'stock', 'image']);

        $this->loadProducts();

        return redirect()->route('panelProducts');
    }



//    public function deleteProduct($productId)
//    {
//        $product = Products::findOrFail($productId);
//
//            // Eliminar el producto de la base de datos
//            $product->delete();
//
//            // Recargar los productos
//            $this->loadProducts();
//
//
//        return redirect()->route('panelProducts');
//    }




}
