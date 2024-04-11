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
            $query->where('state_id', '!=', 2); // Excluir productos con state_id = 2
        }])->get();

        return view('livewire.select-destacats', compact('products', 'categories'));
    }

    public function updateFeaturedProducts(Request $request)
    {
        // Obtener los productos seleccionados y la categoría correspondiente del formulario
        $featured1 = $request->input('featured1');
        $featured2 = $request->input('featured2');
        $categoryId = $request->input('category_id');

        // Limpiar los productos destacados anteriores para la categoría
        Products::where('category_id', $categoryId)->update(['featured' => 0]);

        // Marcar los nuevos productos seleccionados como destacados
        Products::whereIn('id', [$featured1, $featured2])->update(['featured' => 1]);

        // Redirigir de vuelta al menú de administración
        return redirect()->route('admin')->with('success', 'Productos destacados actualizados exitosamente.');
    }
}
