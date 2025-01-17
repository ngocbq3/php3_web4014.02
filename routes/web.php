<?php

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
    Route::get("/{id}/edit", function ($id) {
        return "Edit post id: $id";
    })->name('post.edit');
    Route::get("/index", function () {
        return "List Post";
    });
    Route::get("/create", function () {
        return "Create Post";
    });
});

//Sử dụng view
Route::get('/about', function () {
    return view('about');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
