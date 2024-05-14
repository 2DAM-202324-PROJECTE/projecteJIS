<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SelectDestacats extends Component
{
    public function render()
    {
        $products = Products::where('state_id', '!=', 2)->get();
        $categories = Category::with(['products' => function ($query) {
            $query->where('state_id', '!=', 2); // Exclou productes amb state_id = 2
        }])->get();

        return view('livewire.select-destacats', compact('products', 'categories'));
    }

    public function updateFeaturedProducts(Request $request)
    {
        // Obtenir els productes destacats seleccionats i la categoria
        $featured1 = $request->input('featured1');
        $featured2 = $request->input('featured2');
        $categoryId = $request->input('category_id');

        // Netejar els productes destacats de la categoria seleccionada
        Products::where('category_id', $categoryId)->update(['featured' => 0]);

        // Marcar els nous productes seleccionats com a destacats
        Products::whereIn('id', [$featured1, $featured2])->update(['featured' => 1]);

        return redirect()->route('admin')->with('success', 'Productes destacats actualitzats exitosament.');
    }
}
