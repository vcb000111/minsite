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
    return redirect()->route('admin.access');
});


Route::group(['prefix' => 'manage'], function () {

    Route::get('/auto', 'MovieController@auto')->name('admin.auto');
    Route::get('/', 'HomeController@access')->name('admin.access');
    Route::post('/', 'HomeController@accessPost')->name('admin.access.post');
    Route::get('/exit', 'HomeController@exit')->name('admin.access.exit')->middleware('accessMiddleware');
    Route::get('/list', 'HomeController@index')->name('admin.index')->middleware('accessMiddleware');
    Route::get('/list/search', 'HomeController@listSearch')->name('admin.list.search')->middleware('accessMiddleware');
    Route::get('/thumbnail', 'HomeController@thumbnail')->name('admin.thumbnail')->middleware('accessMiddleware');
    Route::get('/thumbnail/random', 'HomeController@thumbnailRandom')->name('admin.thumbnail.random')->middleware('accessMiddleware');
    Route::get('/thumbnail/fap', 'HomeController@thumbnailFap')->name('admin.thumbnail.fap')->middleware('accessMiddleware');
    Route::get('/thumbnail/search', 'HomeController@thumbnailSearch')->name('admin.thumbnail.search')->middleware('accessMiddleware');
    Route::get('cate/add', 'CateController@create')->middleware('accessMiddleware');
    Route::post('cate/add', 'CateController@store')->name('admin.cate.add')->middleware('accessMiddleware');
    Route::get('movie/add', 'MovieController@create')->middleware('accessMiddleware');
    Route::post('movie/add', 'MovieController@store')->name('admin.movie.add')->middleware('accessMiddleware');
    Route::get('movie/edit/{id}', 'MovieController@edit')->name('admin.movie.get.edit')->middleware('accessMiddleware');
    Route::post('movie/edit/{id}', 'MovieController@update')->name('admin.movie.edit')->middleware('accessMiddleware');
    Route::get('movie/delete/{id}', 'MovieController@destroy')->name('admin.movie.delete')->middleware('accessMiddleware');
    Route::get('movie/rate/{id}', 'MovieController@rate')->name('admin.movie.rate')->middleware('accessMiddleware');
    Route::get('movie/seen/{id}', 'MovieController@seen')->name('admin.movie.seen')->middleware('accessMiddleware');
});
Route::get('{all?}', function () {
    return redirect()->route('admin.access');
});
