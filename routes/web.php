<?php

use App\Http\Controllers\BlogController;
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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/my-blog', [BlogController::class, 'myBlog'])->name('my-blog');

Route::get('/blogs/{id}', [BlogController::class, 'oneBlog'])->name('one-blog');

Route::get('/blogs/{id}/update', [BlogController::class, 'oneBlogUpdate'])->name('blog-update');
Route::post('/blogs/{id}/update', [BlogController::class, 'oneBlogUpdatePost'])->name('one-blog-update-post');
Route::get('/blogs/{id}/delete', [BlogController::class, 'oneBlogDelete'])->name('blog-delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/blog', [BlogController::class, 'create'])->name('blog-create');
});

require __DIR__.'/auth.php';

