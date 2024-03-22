<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class ListProductsAdmin extends Component
{
    public $products;
    public $productsColumns;

    public $categories;
    public $estat;

    public $name;
    public $description;
    public $price;
    public $stock;
    public $selectedProductId;



    public function render()
    {
        return view('livewire.list-products-admin');
    }

    public function mount()
    {
        $this->loadProducts();
        $this->loadProductsColumns();
        $this->categories = Category::all();
        $this->estat = State::all();
    }

    public function loadProducts()
    {
        $this->products = Products::all();
    }

    public function loadProductsColumns()
    {
        $this->productsColumns = Schema::getConnection()
            ->getSchemaBuilder()
            ->getColumnListing('products');

        // Columnas que deseas excluir
        $excludedColumns = ['description', 'image_url', 'created_at', 'updated_at'];

        // Filtrar las columnas excluidas
        $this->productsColumns = array_diff($this->productsColumns, $excludedColumns);
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

    // Agafo la id passada a la vista amb onclick i redirigeixo a la ruta amb les dades.
    // La ruta cridarà al mètode editProduct de la vista (ModifyProducts).
    public function edit($productId)
    {
        return redirect()->route('products.edit', ['id' => $productId]);
    }

}
