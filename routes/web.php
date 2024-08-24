<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
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


Route::get('author/form',[AuthorController::class,'index_author'])->name('author_form');
Route::post('author',[AuthorController::class,'create_author'])->name('author_data');
Route::get("/author/delete/{id}",[AuthorController::class,'delete_author'])->name("author_delete");
Route::get('/author/edit/{id}', [AuthorController::class, 'edit_author'])->name('author_edit');
Route::post('/author/update/{id}', [AuthorController::class, 'update_author'])->name('author_update');


Route::get('blog/form',[BlogController::class,'index_blog'])->name('blog_form');
Route::post('blog',[BlogController::class,'create_blog'])->name('blog_data');
Route::get("/blog/delete/{id}",[BlogController::class,'delete_blog'])->name("blog_delete");
Route::get('/blog/edit/{id}', [BlogController::class, 'edit_blog'])->name('blog_edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update_blog'])->name('blog_update');



