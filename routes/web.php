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
Route::get('/content/{id}/edit', [App\Http\Controllers\ContentController::class, 'edit'])->name('content.edit');
Route::put('/content/update/{id}', [App\Http\Controllers\ContentController::class, 'update'])->name('content.update');
Route::delete("/content/delete/{id}",[App\Http\Controllers\ContentController::class, 'destroy'])->name('content.destroy');


//Button Page
Route::get('/button-page', [App\Http\Controllers\ButtonPageController::class, 'index'])->name('button_page.index');
Route::get('/button-page/create', [App\Http\Controllers\ButtonPageController::class, 'create'])->name('button_page.create');
Route::post('/button-page/store', [App\Http\Controllers\ButtonPageController::class, 'store'])->name('button_page.store');
Route::get('/button-page/{id}/edit', [App\Http\Controllers\ButtonPageController::class, 'edit'])->name('button_page.edit');
Route::put('/button-page/update/{id}', [App\Http\Controllers\ButtonPageController::class, 'update'])->name('button_page.update');
Route::delete('/button-page/destory/{id}', [App\Http\Controllers\ButtonPageController::class, 'destroy'])->name('button_page.destroy');


//Highlight
Route::get('/highlight/create', [App\Http\Controllers\HighlightController::class, 'create'])->name('highlight.create');
Route::post('/highlight/store', [App\Http\Controllers\HighlightController::class, 'store'])->name('highlight.store');
Route::get('/highlight/{id}/edit', [App\Http\Controllers\HighlightController::class, 'edit'])->name('highlight.edit');
Route::post('/highlight/{id}/edit', [App\Http\Controllers\HighlightController::class, 'update'])->name('highlight.update');
Route::delete('/highlight/delete/{id}', [App\Http\Controllers\HighlightController::class, 'destroy'])->name('highlight.destroy');


//Big Button
Route::get('/big-button/create', [App\Http\Controllers\BigButtonController::class, 'create'])->name('big-button.create');
Route::post('/big-button/store', [App\Http\Controllers\BigButtonController::class, 'store'])->name('big-button.store');
Route::get('/big-button/{id}/edit', [App\Http\Controllers\BigButtonController::class, 'edit'])->name('big-button.edit');
Route::post('/big-button/update/{id}', [App\Http\Controllers\BigButtonController::class, 'update'])->name('big-button.update');
Route::delete('/big-button/delete/{id}', [App\Http\Controllers\BigButtonController::class, 'destroy'])->name('big-button.destroy');

//Big Tab
Route::get('/big-tab/create', [App\Http\Controllers\BigTabController::class, 'create'])->name('big-tab.create');
Route::post('/big-tab/store', [App\Http\Controllers\BigTabController::class, 'store'])->name('big-tab.store');
Route::get('/big-tab/{id}/edit', [App\Http\Controllers\BigTabController::class, 'edit'])->name('big-tab.edit');
Route::post('/big-tab/update/{id}', [App\Http\Controllers\BigTabController::class, 'update'])->name('big-tab.update');
Route::delete('/big-tab/delete/{id}', [App\Http\Controllers\BigTabController::class, 'destroy'])->name('big-tab.destroy');