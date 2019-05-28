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

Route::get('/', 'TodosController@index')->name('todos.index');

// Route::get('/todos', 'TodosController@index')->name('todos.index');
// Route::get('/todos/create', 'TodosController@create')->name('todos.create');
// Route::post('/todos', 'TodosController@store')->name('todos.store'); //making a post request
// Route::get('/todos/{id}', 'TodosController@show')->name('todos.show');
// Route::get('/todos/{id}/edit', 'TodosController@edit')->name('todos.edit');
// Route::put('/todos/{id}', 'TodosController@update')->name('todos.update'); //making a put request
// Route::delete('/todos/{id}', 'TodosController@delete')->name('todos.destroy'); //making a delete request


Route::resource('/todos', 'TodosController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
