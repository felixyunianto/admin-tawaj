<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [App\Http\Controllers\api\HomeMobileController::class, 'index']);
Route::get('/highlight', [App\Http\Controllers\api\HighlightMobileController::class, 'index']);
Route::get('/content/{id}', [App\Http\Controllers\api\ContentMobileController::class, 'index']);
Route::get('/button-pages/{id}', [App\Http\Controllers\api\ButtonPageMobileController::class, 'index']);