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
})->name('/');


Auth::routes();
Route::resource('products', 'ProductController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@getindex')->name('/');
Route::get('products.edit', 'ProductController@edit');
Route::get('welcome', 'HomeController@getwelcome')->name('welcome');
Route::resource('favorites', 'FavoriteController');
