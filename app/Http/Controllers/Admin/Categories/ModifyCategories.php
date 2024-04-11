<?php

namespace App\Http\Controllers\Admin\Categories;
use App\Models\Category;

use Illuminate\Http\Request;
use Livewire\Component;

class ModifyCategories extends Component
{
    public $categoryId;
    public $category;
    public $categories;
    public $estat;

    protected $listeners = ['loadDataCategory'];

    public function mount()
    {
        $this->category = Category::all();

    }

    // Amb la id que hem passat al mètode anterior i amb la ruta llegim les dades de la categoria de la id seleccionada.
    public function loadDataCategories($id)
    {
        $this->categoryId = $id;
        $this->category = Category::find($id);


        // Retornem la vista amb les dades de la categoria seleccionat.
        return view('admin.categories.modify-categories', [
            'categories' => $this->category,
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $this->category = Category::find($id);
        if (!$this->category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $this->category->name_category = $request->input('name');
        $this->category->category_description = $request->input('description');
        $this->category->save();

        return redirect()->route('panelCategories')->with('success', 'Category updated successfully');
    }


}
