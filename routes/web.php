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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class);
});
Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blogs'], function () {
    Route::get('/', IndexController::class)->name('blog.index');
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/{blog}', ShowController::class)->name('blog.show');
    });
});
 Route::group(['namespace' => 'App\Http\Controllers\Article', 'prefix' => 'articles', ['middleware' => 'auth']], function () {
    Route::get('/{article}', ShowController::class)->name('article.show');
}); 
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', IndexController::class)->name('admin.index'); 
    });    
    Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function(){
        Route::get('/', IndexController::class)->name('admin.blog.index');
        Route::get('/create', CreateController::class)->name('admin.blog.create');
        Route::post('/', StoreController::class)->name('admin.blog.store');
        Route::get('/{blog}/edit', EditController::class)->name('admin.blog.edit');
        Route::patch('/{blog}', UpdateController::class)->name('admin.blog.update');
    });    
    Route::group(['namespace' => 'Article', 'prefix' => 'articles'], function(){
        Route::get('/', IndexController::class)->name('admin.article.index');
        Route::get('/create', CreateController::class)->name('admin.article.create');
        Route::post('/', StoreController::class)->name('admin.article.store');
        Route::get('/{article}/edit', EditController::class)->name('admin.article.edit');
        Route::patch('/{article}', UpdateController::class)->name('admin.article.update');
        Route::delete('/{article}', DeleteController::class)->name('admin.article.delete');
    });     
});  

Auth::routes();

