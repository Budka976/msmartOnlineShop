<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', function(){
    return view('admin.dashboard');
});

Route::middleware(['auth',\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function(){
    Route::get('admin/dashboard',function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth',\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function(){

    Route::controller(CategoryController::class)->group(function(){
            Route::get('categories','index')->name('admin.categories.index');
            Route::get('categories/create','create')->name('admin.categories.create');
            Route::post('categories','store')->name('admin.categories.store');
            
        });


    // Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin
    // .categories.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('
    admin.categories.create');
    // Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin
    // .categories.store');
    // Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit
    // '])->name('admin.categories.edit');
    // Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->name
    // ('admin.categories.update');
    // Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name
    // ('admin.categories.destroy');

});




