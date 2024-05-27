<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\State;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormAddCategories extends Component
{
    use WithFileUploads;

    public $category;
    public $categories;
    public $estat;

    public $name;
    public $description;
    public $price;
    public $stock;

    // valor per defecte, si no el canviem al formulari es quedarà aquest
    public $image_url;
    public $category_id;
    public $state_id;
    public $image;






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

        // Guardar la imagen en storage/app/Img
        $imageName = $this->image->store('Img', 'public');

        // Mover la imagen a public/Img
        $imagePath = storage_path("app/public/$imageName");
        $publicImagePath = public_path("Img/Categories/{$this->image->getClientOriginalName()}");
        File::move($imagePath, $publicImagePath);

        $imageUrl = asset("Img/Categories/{$this->image->getClientOriginalName()}");
        $imageUrl = str_replace(url('/'), '', $imageUrl);


        // Crear la categoria amb la nova id (serà sempre la més petita disponible)
        Category::create([
            'id' => $newCategoryId,
            'name_category' => $this->name,
            'category_description' => $this->description,
            'category_image' => $imageUrl,
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



}
