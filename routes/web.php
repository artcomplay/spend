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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create_element', 'HomeController@create_element')->name('create_element');
Route::get('/show_elements', 'HomeController@show_elements')->name('show_elements');
Route::post('/remove_element', 'HomeController@remove_element')->name('remove_element');
Route::post('/edit_element', 'HomeController@edit_element')->name('edit_element');


