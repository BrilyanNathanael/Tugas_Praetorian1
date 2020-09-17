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
Auth::routes();

Route::get('/', 'ArticleController@index');
Route::get('/view/{id}', 'ArticleController@show');
Route::group(['middleware' => ['auth']],function(){
    Route::get('/menambahkan', 'ArticleController@create');
    Route::get('/mail', 'ArticleController@mail');
    Route::post('/menambahkan', 'ArticleController@store');
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/mengubah/{id}', 'ArticleController@edit');
    Route::patch('/mengubah/{id}', 'ArticleController@update');
    Route::delete('/menghapus/{id}', 'ArticleController@destroy');
    Route::post('/comment/{id}', 'CommentController@create');
    Route::post('/reply/{id}', 'CommentController@reply');
});


