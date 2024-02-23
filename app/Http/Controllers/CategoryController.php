<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all(); // Recupera todos los productos de la base de datos
        return view('category.index', compact('categories')); // Pasa los productos a la vista
    }
}
