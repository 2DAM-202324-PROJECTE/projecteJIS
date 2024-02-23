<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {

        $products = Products::all(); // Recupera todos los productos de la base de datos
        $categories = Category::all();

        return view('products.index', compact('products', 'categories')); // Pasa los productos a la vista
    }
}
