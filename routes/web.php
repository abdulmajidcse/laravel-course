<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileSystemTestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('about', function() {
    return view('about');
});

Route::get('file', [FileSystemTestController::class, 'createFile']);
Route::post('file/store', [FileSystemTestController::class, 'storeFile']);

// Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::resource('categories', CategoryController::class)->except('show');