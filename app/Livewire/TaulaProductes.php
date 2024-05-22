<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Category;
use App\Models\Marques;
use App\Models\Products;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

// Importa la clase Session

class TaulaProductes extends Component
{
    use WithPagination; // Usa el trait WithPagination

    public $products;
    public $quantity;
    public $minPrice;
    public $maxPrice;
    public $image_url;
    private $paginator; // Define la propiedad $paginator
    protected $listeners = ['pageChanged' => 'loadProducts', 'productAddedToCart' => 'loadProducts', 'filtersApplied'];

    public function render()
    {
        $categories = Category::all();
        $brands = Marques::all();
        return view('livewire.taula-productes', [
            'categories' => $categories,
            'brands' => $brands,
            'searchParam' => session('searchParam'),
            'selectedCategory' => session('selected_category'),
            'selectedBrand' => session('selected_brand'),
        ]);
    }
    public function mount()
    {
        $this->quantity = 1;

        $this->loadProducts();

    }

    // Funció per carregar els productes, depenent dels paràmetres passats, ja siguin del header, d'algun filtre...
    // Funció per carregar els productes, depenent dels paràmetres passats, ja siguin del header, d'algun filtre...
    public function loadProducts()
    {
        $selectedCategoryId = session('selected_category');
        $searchParam = session('searchParam');
        $selectedBrand = session('selected_brand');

        if ($selectedCategoryId) {
            $category = Category::findOrFail($selectedCategoryId);
            $productsQuery = $category->products()->where('state_id', '!=', 2);

            if ($this->minPrice) {
                $productsQuery->where('price', '>=', $this->minPrice);
            }

            if ($this->maxPrice) {
                $productsQuery->where('price', '<=', $this->maxPrice);
            }

            $this->paginator = $productsQuery->paginate(9);

            $this->products = $this->paginator->getCollection();


        } else if ($searchParam) {
            $products = Products::where('name', 'LIKE', "%$searchParam%")
                ->where('state_id', '!=', 2);

            $this->paginator = $products->paginate(9);

            $this->products = $this->paginator->getCollection();


        }else if ($selectedBrand){

            $brand = Marques::findOrFail($selectedBrand);

            $productsQuery = $brand->products()->where('state_id', '!=', 2);

            if ($this->minPrice) {
                $productsQuery->where('price', '>=', $this->minPrice);
            }

            if ($this->maxPrice) {
                $productsQuery->where('price', '<=', $this->maxPrice);
            }

            $this->paginator = $productsQuery->paginate(9);

            $this->products = $this->paginator->getCollection();

        }
        else {
            $products = Products::where('state_id', '!=', 2);


            $this->paginator = $products->paginate(9);

            $this->products = $this->paginator->getCollection();
        }

    }



    public function addToCart($productId): void
    {
        // Busca el producte amb l'id passat per paràmetre a la vista taula-productes
        $product = Products::findOrFail($productId);
        if ($product) {
            // Afegeix el producte al carret
            Cart::add($product->id, $product->name, $product->price, $this->quantity, $product->image_url);
            $this->dispatch('productAddedToCart');
        }
    }

    public function filtersApplied($filters)
    {
        $this->minPrice = $filters['minPrice'];
        $this->maxPrice = $filters['maxPrice'];
        $this->loadProducts();
    }



}
