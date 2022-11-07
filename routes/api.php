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
Route::group(['namespace' => 'App\Http\Controllers\Api\Article', 'prefix' => 'articles', 'middleware' => 'apiadmin'], function () {
    Route::post('/', StoreController::class)->name('admin.article.store');
    Route::patch('/{article}', UpdateController::class)->name('admin.article.update');
    Route::delete('/{article}', DeleteController::class)->name('admin.article.delete');
});
