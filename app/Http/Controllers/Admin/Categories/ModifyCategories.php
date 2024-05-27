<?php

namespace App\Http\Controllers\Admin\Categories;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        if ($request->hasFile('image')) {
            // Obtener la ruta de la imagen de la marca
            $oldImagePath = public_path($category->category_image);

            // Verificar si la imagen existe
            if (File::exists($oldImagePath)) {
                // Eliminar la imagen
                File::delete($oldImagePath);
            }

            // Guardar la nueva imagen en storage/app/Img
            $imageName = $request->file('image')->store('Img', 'public');

            // Mover la nueva imagen a public/Img
            $imagePath = storage_path("app/public/$imageName");
            $publicImagePath = public_path("Img/Categories/{$request->file('image')->getClientOriginalName()}");
            File::move($imagePath, $publicImagePath);

            $imageUrl = asset("Img/Categories/{$request->file('image')->getClientOriginalName()}");
            $imageUrl = str_replace(url('/'), '', $imageUrl);

            // Actualizar la imagen de la marca
            $category->category_image = $imageUrl;
        }



        $category->name_category = $request->input('name');
        $category->category_description = $request->input('description');
        $category->save();

        return redirect()->route('panelCategories')->with('success', 'Category updated successfully');
    }


}
