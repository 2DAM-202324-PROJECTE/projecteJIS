<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Livewire\Component;

class FormAddProducts extends Component
{

    public $products;
    public $categories;
    public $estat;
    public $productsColumns;

    public $name;
    public $description;
    public $price;
    public $stock;

    // valor per defecte, si no el canviem al formulari es quedarà aquest
    public $image_url = 'https://mijnbuurtje.imgix.net/1906/578fad10-9675-11e9-9e2a-03c3674f56a6.jpeg?h=2614&w=2614&s=4a87e90cd71ab7cafbe8229ab40521b7';
    public $category_id;
    public $state_id;

    public $selectedProductId;




    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
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

    }

    public function loadProducts()
    {
        $this->products = Products::all();
    }




    public function createProduct()
    {
        $this->validate();

        // Obté las IDs existents
        $existingIds = Products::pluck('id')->toArray();

        // Busca la primera ID disponible
        $newProductId = 1;
        while (in_array($newProductId, $existingIds)) {
            $newProductId++;
        }

        // Crear el producte amb la nova id (serà sempre la més petita disponible)
        Products::create([
            'id' => $newProductId,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image_url' => $this->image_url,
            'category_id' => $this->category_id,
            'state_id' => $this->state_id,
        ]);

        $this->loadProducts();

        return redirect()->route('panelProducts');
    }



    public function deleteProduct($productId)
    {
        $product = Products::findOrFail($productId);
        if ($product) {
            $product->delete();
            $this->loadProducts();
        }
        return redirect()->route('panelProducts');
    }

//    private function resetForm()
//    {
//        $this->name = '';
//        $this->description = '';
//        $this->price = '';
//        $this->selectedProductId = null;
//    }
}
