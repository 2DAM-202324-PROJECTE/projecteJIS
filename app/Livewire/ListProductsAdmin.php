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
    public $selectedCategory;
    public $selectedProductId;
    public $orderBy;
    public $groupBy;

    public $selectedState;

    public function render()
    {
        return view('livewire.list-products-admin');
    }


    public function mount()
    {
        $this->orderBy = 'id';
        $this->groupBy = null;

        $this->loadProducts();
        $this->loadProductsColumns();
        $this->categories = Category::all();
        $this->estat = State::all();
    }

    /**
     * Carrega els productes de la bd
     * @return void
     */
    public function loadProducts()
    {
        $query = Products::query();

        // Aplicar filtre d'ordre
        $query->orderBy($this->orderBy, 'asc');

        // Aplicar filtre de categoría
        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Aplicar filtre de estat
        if ($this->selectedState) {
            $query->where('state_id', $this->selectedState);
        }

        $this->products = $query->get();
    }

    /**
     * Carrega les columnes de la taula products
     * @return void
     */
    public function loadProductsColumns()
    {
        $this->productsColumns = Schema::getConnection()
            ->getSchemaBuilder()
            ->getColumnListing('products');

        // Columnes que vols excloure del llistat
        $excludedColumns = ['description', 'image_url', 'created_at', 'updated_at'];

        // Filtrar les columnes excloses
        $this->productsColumns = array_diff($this->productsColumns, $excludedColumns);
    }


    /**
     * Borra el producte de la bd i la imatge associada dels arxius locals
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct($productId)
    {
        $product = Products::findOrFail($productId);

        if ($product) {
            // Eliminar la imatge(dels arxius locals) associada al producte si existeix
            if ($product->image_url) {
                $imageUrl = public_path($product->image_url);
                if (file_exists($imageUrl)) {
                    unlink($imageUrl);
                }
            }

            // Elimina el producte de la bd
            $product->delete();

            // Recargar los productos
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
