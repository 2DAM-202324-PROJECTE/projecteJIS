<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Products;
use App\Models\State;
use Livewire\Component;

class FormAddCategories extends Component
{

    public $category;
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
    ];
    public function render()
    {
        return view('livewire.form-add-categories');
    }


    public function mount()
    {
        $this->loadCategory();


    }

    public function loadCategory()
    {
        $this->category = Category::all();
    }




    public function createCategory()
    {
        $this->validate();

        // Obté las IDs existents
        $existingIds = Category::pluck('id')->toArray();

        // Busca la primera ID disponible
        $newCategoryId = 1;
        while (in_array($newCategoryId, $existingIds)) {
            $newCategoryId++;
        }

        // Crear el producte amb la nova id (serà sempre la més petita disponible)
        Category::create([
            'id' => $newCategoryId,
            'name_category' => $this->name,
            'category_description' => $this->description,
            'category_image' => $this->image_url,
        ]);

        $this->loadCategory();

        return redirect()->route('panelCategories');
    }



    public function deleteCatgeory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        if ($category) {
            $category->delete();
            $this->loadCategory();
        }
        return redirect()->route('panelCategories');
    }


//    private function resetForm()
//    {
//        $this->name = '';
//        $this->description = '';
//        $this->price = '';
//        $this->selectedProductId = null;
//    }
}
