<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAuth;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix("posts")->group(function () {
    Route::get("/", [PostController::class, 'index'])->name('posts.index');
    Route::get("/create", [PostController::class, 'create'])->name('posts.create');
    Route::post("/create", [PostController::class, 'store']);
    Route::get("/{id}/edit", [PostController::class, 'edit'])->name('posts.edit');
    Route::put("/{id}/edit", [PostController::class, 'update']);
    Route::delete("/{id}/delete", [PostController::class, "destroy"])->name('posts.destroy');
});

//Admin
Route::middleware(CheckAuth::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.list');
        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::post('/posts/create', [AdminPostController::class, 'store']);
        Route::get('/posts/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/posts/edit/{id}', [AdminPostController::class, 'update']);
        Route::delete('/posts/delete/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
