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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('events', 'EventsController');
Route::resource('categories', 'CategoriesController');
Route::resource('purchases', 'PurchasesController');
Route::get('/purchase/event/{event_id}', 'PurchasesController@create');
Route::get('/purchase/user/{user_id}', 'PurchasesController@view');

