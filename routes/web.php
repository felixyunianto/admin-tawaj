<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category-content', [App\Http\Controllers\CategoryContentController::class, 'index'])->name('content-category');
Route::get('/category-content/create', [App\Http\Controllers\CategoryContentController::class, 'create'])->name('content-category.create');
Route::post('/category-content/store', [App\Http\Controllers\CategoryContentController::class, 'store'])->name('content-category.store');
Route::get('/category-content/{id}/edit', [App\Http\Controllers\CategoryContentController::class, 'edit'])->name('content-category.edit');
Route::put('/category-content/{id}/update', [App\Http\Controllers\CategoryContentController::class, 'update'])->name('content-category.update');
Route::delete('/category-content/destroy/{id}', [App\Http\Controllers\CategoryContentController::class, 'destroy'])->name('content-category.destroy');


//Content
Route::get('/content', [App\Http\Controllers\ContentController::class, 'index'])->name('content');
Route::get('/content/create', [App\Http\Controllers\ContentController::class, 'create'])->name('content.create');
Route::post('/content/store', [App\Http\Controllers\ContentController::class, 'store'])->name('content.store');


//Button Page
Route::get('/button-page', [App\Http\Controllers\ButtonPageController::class, 'index'])->name('button_page.index');
Route::get('/button-page/create', [App\Http\Controllers\ButtonPageController::class, 'create'])->name('button_page.create');
Route::post('/button-page/store', [App\Http\Controllers\ButtonPageController::class, 'store'])->name('button_page.store');
Route::delete('/button-page/destory/{id}', [App\Http\Controllers\ButtonPageController::class, 'destroy'])->name('button_page.destroy');


//Highlight
Route::get('/highlight/create', [App\Http\Controllers\HighlightController::class, 'create'])->name('highlight.create');
Route::post('/highlight/store', [App\Http\Controllers\HighlightController::class, 'store'])->name('highlight.store');


//Big Button
Route::get('/big-button/create', [App\Http\Controllers\BigButtonController::class, 'create'])->name('big-button.create');
Route::post('/big-button/store', [App\Http\Controllers\BigButtonController::class, 'store'])->name('big-button.store');