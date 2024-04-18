<?php

use App\Http\Controllers\Admin\Categories\AddCategories;
use App\Http\Controllers\Admin\Categories\Index as AdminCategories;
use App\Http\Controllers\Admin\Categories\ModifyCategories;
use App\Http\Controllers\Admin\Index as AdminIndex;
use App\Http\Controllers\Admin\Products\AddProducts;
use App\Http\Controllers\Admin\Products\Featureds;
use App\Http\Controllers\Admin\Products\Index as AdminProducts;
use App\Http\Controllers\Admin\Products\ModifyProducts;
use App\Http\Controllers\Category\Index as CategoryIndex;
use App\Http\Controllers\CheckoutView;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentView;
use App\Http\Controllers\Products\Index as ProductsIndex;
use App\Http\Controllers\States\Index as StatesIndex;
use App\Livewire\CartPage;
use App\Livewire\CheckoutComponent;
use App\Livewire\Header;
use App\Livewire\PaymentComponent;
use App\Livewire\SelectDestacats;
use App\Livewire\Welcome;
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

//Route::get('/', function () {
//    return view('welcome');
//}) ->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', Welcome::class)->name('welcome');



// name() es necessari per a poder fer servir les rutes a href, fent servir el nom
Route::get('/categories', CategoryIndex::class)->name('categories');

Route::get('/products', ProductsIndex::class)->name('products');
Route::get('/products/category/{category}', ProductsIndex::class)->name('products.index.category');

Route::get('/states', StatesIndex::class)->name('states');


Route::get('/products/{category}', ProductsIndex::class)->name('products.by.category');


// Ruta per canviar l'idioma
Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap');

Route::get('/search', [Header::class, 'search'])->name('search');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('/admin', AdminIndex::class)->name('admin');

Route::get('/panelProducts', AdminProducts::class)->name('panelProducts');

Route::get('/addProducts', AddProducts::class)->name('addProducts');

Route::get('/checkout', CheckoutView::class)->name('checkout');

Route::get('/products/edit/{id}', [ModifyProducts::class, 'loadDataProduct'])->name('products.edit');

Route::put('/products/{id}', [ModifyProducts::class, 'updateProduct']);

Route::get('/featureds', Featureds::class)->name('featureds');

Route::post('/fetauredProduct', [SelectDestacats::class, 'updateFeaturedProducts'])->name('updateFeaturedProducts');

Route::get('/panelCategories', AdminCategories::class)->name('panelCategories');

Route::get('/addCategories', AddCategories::class)->name('addCategories');

Route::get('/categories/edit/{id}', [ModifyCategories::class, 'loadDataCategories'])->name('categories.edit');

Route::put('/categories/{id}', [ModifyCategories::class, 'updateCategory']);

Route::get('/payment', PaymentView::class)->name('payment');

