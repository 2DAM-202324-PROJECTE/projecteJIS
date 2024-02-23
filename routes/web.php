<?php

use App\Livewire\Category\Index as CategoryIndex;

use App\Livewire\Products\Index as ProductsIndex;


use App\Livewire\States\Index as StatesIndex;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// name() es necessari per a poder fer servir les rutes a href, fent servir el nom
Route::get('/categories', CategoryIndex::class)->name('categories');

Route::get('/products', ProductsIndex::class)->name('products');

Route::get('/states', StatesIndex::class)->name('states');

// Ruta per canviar l'idioma
Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class, 'swap'])->name('lang.swap');


