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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [App\Http\Controllers\api\AuthMobileController::class, 'login']);
Route::post('/save-token/{id}', [App\Http\Controllers\api\AuthMobileController::class, 'saveToken']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::post("/logout", [App\Http\Controllers\api\AuthMobileController::class, 'logout']);
});
Route::post("/register", [App\Http\Controllers\api\AuthMobileController::class, 'register']);

Route::get('/home', [App\Http\Controllers\api\HomeMobileController::class, 'index']);
Route::get('/highlight', [App\Http\Controllers\api\HomeMobileController::class, 'highlight']);
Route::get('/big-button', [App\Http\Controllers\api\HomeMobileController::class, 'bigButton']);
Route::get('/all-big-button', [App\Http\Controllers\api\HomeMobileController::class, 'allBigButton']);

Route::get('/big-tab', [App\Http\Controllers\api\HomeMobileController::class, 'bigTab']);


Route::get('/content/{id}', [App\Http\Controllers\api\ContentMobileController::class, 'index']);
Route::get('/button-pages/{id}', [App\Http\Controllers\api\ButtonPageMobileController::class, 'index']);

Route::get("/profile/{id}", [App\Http\Controllers\api\ProfileController::class, 'index']);
Route::post("/edit-profile/{id}", [App\Http\Controllers\api\ProfileController::class, 'editProfile']);

Route::get("/notifications", [App\Http\Controllers\api\NotificationMobileController::class, 'index']);

Route::post('/search',[App\Http\Controllers\api\SearchController::class, 'index']);