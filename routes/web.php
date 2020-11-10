<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'admin/products'], function(){
    Route::get('', [ProductController::class, 'index'])->name('product.index');
    
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::get('create-pizza', [ProductController::class, 'createPizza'])->name('product.create_pizza');
    Route::post('create-pizza-variation', [ProductController::class, 'createPizzaVariation'])->name('product.create_pizza_variation');
    
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::post('store-pizza', [ProductController::class, 'storePizza'])->name('product.store_pizza');

    Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('edit-pizza/{product}', [ProductController::class, 'editPizza'])->name('product.edit_pizza');

    Route::post('update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('update-pizza/{product}', [ProductController::class, 'updatePizza'])->name('product.update_pizza');
    
    Route::post('delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('show/{product}', [ProductController::class, 'show'])->name('product.show');
 });


 use App\Http\Controllers\SizeController;

Route::group(['prefix' => 'admin/sizes'], function(){
   Route::get('', [SizeController::class, 'index'])->name('size.index');
   Route::get('create', [SizeController::class, 'create'])->name('size.create');
   Route::post('store', [SizeController::class, 'store'])->name('size.store');
   Route::get('edit/{size}', [SizeController::class, 'edit'])->name('size.edit');
   Route::post('update/{size}', [SizeController::class, 'update'])->name('size.update');
   Route::post('delete/{size}', [SizeController::class, 'destroy'])->name('size.destroy');
   Route::get('show/{size}', [SizeController::class, 'show'])->name('size.show');
});


use App\Http\Controllers\CategorieController;

Route::group(['prefix' => 'admin/categories'], function(){
   Route::get('', [CategorieController::class, 'index'])->name('categorie.index');
   Route::get('create', [CategorieController::class, 'create'])->name('categorie.create');
   Route::post('store', [CategorieController::class, 'store'])->name('categorie.store');
   Route::get('edit/{categorie}', [CategorieController::class, 'edit'])->name('categorie.edit');
   Route::post('update/{categorie}', [CategorieController::class, 'update'])->name('categorie.update');
   Route::post('delete/{categorie}', [CategorieController::class, 'destroy'])->name('categorie.destroy');
   Route::get('show/{categorie}', [CategorieController::class, 'show'])->name('categorie.show');
});

use App\Http\Controllers\Front;

Route::group(['prefix' => 'fronts'], function(){
   Route::get('', [Front::class, 'index'])->name('front.index');
   Route::get('create', [Front::class, 'create'])->name('front.create');
   Route::post('store', [Front::class, 'store'])->name('front.store');
   Route::get('edit/{front}', [Front::class, 'edit'])->name('front.edit');
   Route::post('update/{front}', [Front::class, 'update'])->name('front.update');
   Route::post('delete/{front}', [Front::class, 'destroy'])->name('front.destroy');
   Route::get('show/{front}', [Front::class, 'show'])->name('front.show');
   Route::post('add-to-cart-api', [Front::class, 'addToCartApi'])->name('addToCartApi');
});

