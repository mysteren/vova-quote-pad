<?php

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

Route::namespace('Edit')->group(function () {
    // Controllers Within The "App\Http\Controllers\Edit" Namespace
    Route::get('edit/home', 'HomeController@index')->name('home');

    Route::resource('edit/quotes', 'QuotesController');
    Route::resource('edit/pictures', 'PicturesController');
    Route::resource('edit/authors', 'AuthorsController');

});