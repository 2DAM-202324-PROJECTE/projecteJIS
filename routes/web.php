<?php

use App\Http\Controllers\Admin\Categories\AddCategories;
use App\Http\Controllers\Admin\Categories\Index as AdminCategories;
use App\Http\Controllers\Admin\Categories\ModifyCategories;
use App\Http\Controllers\Admin\Index as AdminIndex;
use App\Http\Controllers\Admin\Marques\AddMarques;
use App\Http\Controllers\Admin\Marques\Index as AdminMarques;
use App\Http\Controllers\Admin\Marques\ModifyMarques;
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
use App\Livewire\ProductDetailsComponent;
use App\Livewire\SelectDestacats;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutes de admin
|--------------------------------------------------------------------------
*/
Route::get('/admin', AdminIndex::class)->name('admin');

/* Productes */
Route::get('/panelProducts', AdminProducts::class)->name('panelProducts');
Route::get('/products/edit/{id}', [ModifyProducts::class, 'loadDataProduct'])->name('products.edit');
Route::put('/products/{id}', [ModifyProducts::class, 'updateProduct']);
Route::get('/addProducts', AddProducts::class)->name('addProducts');

/* Categories */
Route::get('/panelCategories', AdminCategories::class)->name('panelCategories');
Route::get('/addCategories', AddCategories::class)->name('addCategories');
Route::get('/categories/edit/{id}', [ModifyCategories::class, 'loadDataCategories'])->name('categories.edit');
Route::put('/categories/{id}', [ModifyCategories::class, 'updateCategory']);

/* Marques */
Route::get('/panelMarques', AdminMarques::class)->name('panelMarques');
Route::get('/addMarques', AddMarques::class)->name('addMarques');
Route::get('/marques/edit/{id}', [ModifyMarques::class, 'loadDataMarca'])->name('marques.edit');
Route::put('/marques/{id}', [ModifyMarques::class, 'updateMarca']);

/* Productes Destacats */
Route::get('/featureds', Featureds::class)->name('featureds');
Route::post('/fetauredProduct', [SelectDestacats::class, 'updateFeaturedProducts'])->name('updateFeaturedProducts');

/*
|--------------------------------------------------------------------------
| Rutes de filtratge i llistat de productes
|--------------------------------------------------------------------------
*/
Route::get('/products', ProductsIndex::class)->name('products');
Route::get('/search', [Header::class, 'search'])->name('search');
Route::get('/products/category/{category}', ProductsIndex::class)->name('products.index.category');
Route::get('/products/{category}', ProductsIndex::class)->name('products.by.category');
Route::get('/product/{id}', [App\Http\Controllers\ProductDetails::class, 'show'])->name('product.show');
/*
|--------------------------------------------------------------------------
| Rutes de carro
|--------------------------------------------------------------------------
*/
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', CheckoutView::class)->name('checkout');
Route::get('/payment', PaymentView::class)->name('payment');
Route::post('/checkout', [CheckoutComponent::class, 'store'])->name('checkout.store');

/*
|--------------------------------------------------------------------------
| Rutes d'idioma
|--------------------------------------------------------------------------
*/
Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap');

/*
|--------------------------------------------------------------------------
| Altres rutes
|--------------------------------------------------------------------------
*/
Route::get('/', Welcome::class)->name('welcome');
Route::get('/categories', CategoryIndex::class)->name('categories');
Route::get('/states', StatesIndex::class)->name('states');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


