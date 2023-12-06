<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::get('/', [ProductController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/products', AdminProductController::class)->except([
        'edit', 'store'
    ]);
    Route::get('admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');

    Route::get('admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('admin/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::put('admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');

});


Route::get('/products', [ProductController::class, 'product']);
Route::get('/products/sort/{minPrice}/{maxPrice}', [ProductController::class, 'sortByPriceRange']);

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/edit/{cart}', [CartController::class, 'editCart'])->name('cart.edit');
Route::delete('/cart/delete/{cart}', [CartController::class, 'deleteFromCart'])->name('cart.delete');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/products/sort', [ProductController::class, 'sortByPriceRange'])->name('products.sortByPriceRange');
Route::post('/products/sortByPrice', [ProductController::class, 'sortByPrice'])->name('products.sortByPrice');


require __DIR__.'/auth.php';
