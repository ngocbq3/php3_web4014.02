<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
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
Route::get("/create", function () {
    return "Create New Website";
});


Route::prefix("posts")->group(function () {

    Route::get("/", [PostController::class, 'index'])->name('posts.index');
    Route::get("/create", [PostController::class, 'create'])->name('posts.create');
    Route::post("/create", [PostController::class, 'store']);
    Route::get("/{id}/edit", [PostController::class, 'edit'])->name('posts.edit');
    Route::put("/{id}/edit", [PostController::class, 'update']);
    Route::delete("/{id}/delete", [PostController::class, "destroy"])->name('posts.destroy');
});

//Sử dụng view
Route::get('/about', function () {
    return view('about');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
