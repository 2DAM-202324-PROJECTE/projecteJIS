<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class ListCategoriesAdmin extends Component
{
    public $products;
    public $categoriesColumns;

    public $categories;
    public $estat;

    public $name;
    public $description;
    public $price;
    public $stock;

    public $selectedProductId;
    public $orderBy;
    public $groupBy;



    public function render()
    {
        return view('livewire.list-categories-admin');
    }

    public function mount()
    {
        $this->orderBy = 'id';
        $this->groupBy = null;

        $this->loadCategories();
        $this->loadCategoriesColumns();

    }


    public function loadCategories()
    {
        $query = Category::query();

        // Aplicar filtro de orden
        $query->orderBy($this->orderBy, 'asc');

        $this->categories = $query->get();
    }

    public function loadCategoriesColumns()
    {
        $this->categoriesColumns = Schema::getConnection()
            ->getSchemaBuilder()
            ->getColumnListing('categories');

        // Columnas que deseas excluir
        $excludedColumns = ['category_image','created_at', 'updated_at'];

        // Filtrar las columnas excluidas
        $this->categoriesColumns = array_diff($this->categoriesColumns, $excludedColumns);
    }


    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        if ($category) {
            // Obtener todos los productos asociados a esta categoría
            $products = Products::where('category_id', $categoryId)->get();

            // Eliminar cada producto y su imagen asociada, si existe
            foreach ($products as $product) {
                if ($product->image_url) {
                    $imageUrl = public_path($product->image_url);
                    if (file_exists($imageUrl)) {
                        unlink($imageUrl);
                    }
                }
                $product->delete();
            }

            $category->delete();

            $this->loadCategories();
        }
        return redirect()->route('panelCategories');
    }

//
//    // Agafo la id passada a la vista amb onclick i redirigeixo a la ruta amb les dades.
//    // La ruta cridarà al mètode editProduct de la vista (ModifyProducts).
    public function edit($categoryId)
    {
        return redirect()->route('categories.edit', ['id' => $categoryId]);
    }

}
