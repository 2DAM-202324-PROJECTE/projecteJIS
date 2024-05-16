<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
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


    public function mount(): void
    {
        $this->orderBy = 'id';
        $this->groupBy = null;
        // Carregar els productes de la bd i les columnes de la taula
        $this->loadProducts();
        $this->loadProductsColumns();
        // Carregar les categories i estats per a filtrar
        $this->categories = Category::all();
        $this->estat = State::all();
    }

    /**
     * Carrega els productes de la bd
     * @return void
     */
    public function loadProducts(): void
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
    public function loadProductsColumns(): void
    {
        $this->productsColumns = Schema::getConnection()
            ->getSchemaBuilder()
            ->getColumnListing('products');

        // Columnes que s'exclouen del llistat
        $excludedColumns = ['description', 'image_url', 'created_at', 'updated_at'];

        // Filtrar les columnes excloses
        $this->productsColumns = array_diff($this->productsColumns, $excludedColumns);
    }


    /**
     * Borra el producte de la bd i la imatge associada dels arxius locals
     * @param $productId
     * @return RedirectResponse
     */
    public function deleteProduct($productId)
    {
        $product = Products::findOrFail($productId);

        if ($product) {
            // Eliminar la imatge (dels arxius) associada al producte si existeix
            if ($product->image_url) {
                $imageUrl = public_path($product->image_url);
                if (file_exists($imageUrl)) {
                    unlink($imageUrl);
                }
            }

            // Elimina el producte de la bd
            $product->delete();

            $this->loadProducts();
        }

        return redirect()->route('panelProducts');
    }


    // Agafo la id passada a la vista amb onclick i redirigeixo a la ruta amb les dades.
    // La ruta cridarà al mètode editProduct de la vista (ModifyProducts).
    public function edit($productId)
    {
        return redirect()->route('products.edit', ['id' => $productId, 'metode' => 'edit']); //Donem la id del producte i el mètode 'edit'p er a determinar que fara o no farà la vista.
    }

    public function details($productId)
    {
        return redirect()->route('products.edit', ['id' => $productId, 'metode' => 'details']); //Donem la id del producte i el mètode 'details' per a determinar que fara o no farà la vista.
    }

}
